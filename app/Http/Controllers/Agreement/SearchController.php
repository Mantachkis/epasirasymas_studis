<?php

namespace App\Http\Controllers\Agreement;

use App\Models\Esp\UserFileUpload;
use Illuminate\Http\Request;
use App\Models\Esp\BpoPakviestiEsign;
use App\Models\Esp\AgreementType;
use App\Models\Esp\Agreement;
use App\Models\FileUpload\UploadedFiles;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        $year = date('Y');
        $type = '1';

        $types = AgreementType::types();
        $stages = BpoPakviestiEsign::stages($year);
        $programs = BpoPakviestiEsign::programs($year, $type);

        return view('agreement.searchIndex', ['name' => '',
                                            'surname' => '',
                                            'persCode' => '',
                                            'selectedType' => $type,
                                            'selectedProgram' => '',
                                            'selectedYear' => $year,
                                            'selectedStage' => '',
                                            'types' => $types,
                                            'stages' => $stages,
                                            'programs' => $programs]);
    }

    public function searchForm(Request $request)
    {
        $types = AgreementType::types();
        $stages = BpoPakviestiEsign::stages($request->input('year'));
        $programs = BpoPakviestiEsign::programs($request->input('year'), $request->input('type'));

        return view('agreement.searchForm', ['name' => $request->input('name'),
                                                    'surname' => $request->input('surname'),
                                                    'persCode' => $request->input('persCode'),
                                                    'selectedType' => $request->input('type'),
                                                    'selectedProgram' => $request->input('program'),
                                                    'selectedYear' => $request->input('year'),
                                                    'selectedStage' => $request->input('stage'),
                                                    'types' => $types,
                                                    'stages' => $stages,
                                                    'programs' => $programs]);
    }

    public function searchResults(Request $request)
    {
        $searchResults = BpoPakviestiEsign::with('agreement.agreementAgreementStatus')
                                        ->with('luadmProgrammaPkods')
                                        ->select()
                                        ->whereRaw("vardas like '%".$request->input('name')."%'
                                                        and upper(pavarde) like upper('%".$request->input('surname')."%')
                                                        and upper(asmens_kodas) like upper('%".$request->input('persCode')."%')
                                                        and metai = '".$request->input('year')."'
                                                        and etapas like '%".$request->input('stage')."%' 
                                                        and (nvl(vdu_pkods, ' ') like '%".$request->input('program')."%'
                                                        or nvl(lama_kodas, ' ') like '%".$request->input('program')."%')")
                                        ->whereHas('agreement', function($query) use ($request){
                                            $query->where('agreement_type_id', $request->input('type'));
                                        })
                                        ->orderBy('vardas')
                                        ->get();
        return view('agreement.searchResults', ['searchResults' => $searchResults]);
    }

    public function updateOk(Request $request)
    {
        $agreement = Agreement::find($request->input('agreement_id'));

        if ($agreement->ok_check == 1) {
            $agreement->ok_check = null;
        } else {
            $agreement->ok_check = 1;
        }

        $agreement->save();
    }

    public function agreementCancelBody(Request $request)
    {
        $agreement = BpoPakviestiEsign::with('agreement')->where('agreement_id', $request->input('agreement_id'))->first();

        return view('agreement.agreementCancelBody', ['agreement' => $agreement]);
    }

    public function agreementCancelConfirm(Request $request)
    {
        $agreement = Agreement::find($request->input('agreement_id'));

        if ($agreement->agreement_status != 'AS0003') {
           // $agreement->agreement_status = 'AS0003';
            //$agreement->save();
            null;
        }

        $agreement = Agreement::find($request->input('agreement_id'));

        return view('agreement.agreementCancelConfirm', ['agreement' => $agreement]);
    }

    public function agreementFileList(Request $request)
    {
        $siteName = 'http://epasirasymas.vdu.lt';

        $agreement = Agreement::find($request->input('agreement_id'));

        $fileList = UserFileUpload::with('agreement')
                                    ->where('agreement_id', $request->input('agreement_id'))
                                    ->where('not_active', null)
                                    ->get();

        return view('agreement.fileList', ['siteName' => $siteName, 'agreement' => $agreement, 'fileList' => $fileList]);
    }

    public function agreementOracleFile(Request $request)
    {
        $file = UploadedFiles::where('name', $request->input('file_name'))->first();
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename="'.$file->name.'"');
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: '. $file->doc_size);
        echo $file->blob_content;
    }

    public function uploadFile(Request $request)
    {
        if ($request->file('file') === null) {
            echo 'no_file';
            die;
        }

        $path = $request->file('file')->store('uploads');

        if ($path === null) {
            echo 'file_upload_failed';
        }

        $agreementFileUpload = new UserFileUpload;
        $agreementFileUpload->file_name = $request->file('file')->getClientOriginalName();
        $agreementFileUpload->upload_date = date("Y-m-d H:i:s");
        $agreementFileUpload->php_file_name = $path;
        $agreementFileUpload->user_name = 'User';
        $agreementFileUpload->comments = $request->input('comment');
        $agreementFileUpload->agreement_id = $request->input('agreement_id');
        $agreementFileUpload->id = $agreementFileUpload->userFileUploadNextId();

        if (!$agreementFileUpload->save()) {
            Storage::delete($path);
            echo 'file_db_save_failed';
        }

        echo $request->input('agreement_id');
    }

    public function deleteFile(Request $request)
    {
        $deletedFile = UserFileUpload::find($request->input('fileId'));

        if ($deletedFile === null) {
            echo 'no_file';
            die();
        }

        $deletedFile->not_active = 1;

        if (!$deletedFile->save()) {
            echo 'delete_failed';
            die();
        }

        if (!Storage::delete($deletedFile->php_file_name)) {
            null;
        }

        echo $deletedFile->agreement_id;
    }

    public function additionalPerson(Request $request)
    {
        $agreement = Agreement::find($request->input('agreement_id'));

        if ($request->has('additional_person')){


            $agreement->additional_person = $request->input('additional_person');

            $agreement->save();
        }

        return view('agreement.additionalPerson', ['agreement' => $agreement]);
    }
}