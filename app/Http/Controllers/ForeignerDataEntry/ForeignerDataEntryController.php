<?php


namespace App\Http\Controllers\ForeignerDataEntry;


use App\Http\Services\ForeignerDataEntry\ForeignerDataEntryMultifieldOptions;
use App\Http\Services\ForeignerDataEntry\ForeignerDataRetrievalService;
use App\Models\Esp\ForeignerDataEntry;
use App\Models\Esp\ForeignerDataEntryInfo;
use App\Models\Luadm\Strukturv;
use App\Models\Luadm\Tips;
use GrahamCampbell\Flysystem\FlysystemManager;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ForeignerDataExport;


class ForeignerDataEntryController
{
    /**
     * @var ForeignerDataEntryMultifieldOptions
     */
    private $multifieldOptions;
    /**
     * @var ForeignerDataRetrievalService
     */
    private $dataRetrievalService;
    /**
     * @var FlysystemManager
     */
    private $flysystemManager;

    /**
     * ForeignerDataEntryController constructor.
     * @param ForeignerDataEntryMultifieldOptions $multifieldOptions
     * @param ForeignerDataRetrievalService $dataRetrievalService
     * @param FlysystemManager $flysystemManager
     */
    public function __construct(ForeignerDataEntryMultifieldOptions $multifieldOptions, ForeignerDataRetrievalService $dataRetrievalService, FlysystemManager $flysystemManager)
    {
        $this->multifieldOptions = $multifieldOptions;
        $this->dataRetrievalService = $dataRetrievalService;
        $this->flysystemManager = $flysystemManager;
    }

    public function getIndex()
    {
        return view('foreignerDataEntry.index', [
            'tableData' => $this->dataRetrievalService->getTableFieldData()
        ]);
    }

    public function getEntryDataForm()
    {
        return view('foreignerDataEntry.dataEntryForm', [
            'studyStages' => $this->multifieldOptions->getStudyStages(),
            'accreditationStatuses' => $this->multifieldOptions->getAccreditationStatuses(),
            'programActivityStatuses' => $this->multifieldOptions->getProgramActivityStatuses(),
            'programPurposesList' => $this->multifieldOptions->getProgramPurposeList(),
            'programAccreditationStatuses' => $this->multifieldOptions->getProgramAccreditationStatuses(),
            'yesNoStatuses' => $this->multifieldOptions->getYesNoStatuses(),
            'yesNoOtherStatuses' => $this->multifieldOptions->getYesNoOtherStatuses(),
            'skvcDecisionStatuses' => $this->multifieldOptions->getSkvcDecisionStatuses(),
            'qualificationStatuses' => $this->multifieldOptions->getQualificationStatuses(),
            'acceptanceDecisionList' => $this->multifieldOptions->getAcceptanceDecisionList(),
            'facultyList' => Strukturv::getFacultyList(),
            'countryList' => Tips::getCountryList()
        ]);
    }

    public function storeEntryDataForm(Request $req)
    {
        $f = new ForeignerDataEntry();
        $f->submission_user = auth()->user()->cilveks_ckods;
        $f->submit_date = date('Y-m-d', strtotime('now + 2 hours'));

        $f->save();

        foreach($req->except('_token') as $fieldName => $fieldAnswer)
        {
            $fInfo = new ForeignerDataEntryInfo();
            $fInfo->foreigner_data_entry_id = $f->id;
            $fInfo->data_field = $fieldName;
            if($fieldName === 'skvc-recommendation-file') {
                $fInfo->data_field_answer = $this->uploadSKVCFile($req->file('skvc-recommendation-file'));
            } else {
                $fInfo->data_field_answer = $fieldAnswer;
            }
            $fInfo->save();

        }
        return redirect(route('epasirasymas.foreignerDataEntry.index'))->with('data-success', 'Pridetas naujas prašymas');
    }

    public function getForeignerApplicationData(int $id)
    {
        return view('foreignerDataEntry.foreignerApplicationData', [
            'fieldData' => $this->dataRetrievalService->getTableFieldData($id),
            'id' => $id
        ]);
    }

    public function getProgramsByFaculty(string $stkods)
    {
        return view('foreignerDataEntry.partials.programDropdownList', [
            'programs' => $this->dataRetrievalService->getProgramList($stkods)
        ]);
    }

    public function uploadSKVCFile(UploadedFile $file) : string
    {
        $randomName = str_random(20);
        $stream = fopen($file->getRealPath(), 'rb+');
        $this->flysystemManager->writeStream('app_uploads/'.$randomName.'.'.$file->guessExtension(), $stream);
        fclose($stream);

        return env('FILES_UPLOAD_URL')."$randomName.".$file->guessExtension();
    }

    
    public function getForeignerDataExcelExport()
    {
        return Excel::download(new ForeignerDataExport(), 'Atvykstančiųjų duomenys.xlsx');
    }
}
