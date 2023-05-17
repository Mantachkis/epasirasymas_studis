<?php

namespace App\Http\Controllers\Agreement;


use App\Models\Esp\Agreement;
use App\Models\Esp\BpoPakviestiEsign;
use App\Models\Luadm\Tips;
use Validator;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;
use App\Models\Luadm\BpoProgramos;
use App\Models\Luadm\Cilveks;
use App\Models\Esp\Users;
use App\Http\Controllers\Controller;
use Barryvdh\DomPDF\Facade as PDF;

class CreateController extends Controller
{
    private $agreementTypes = array('Studijų' => 'studies',
                                   'Studijų EN' => 'studiesEn',
                                   'Klausytojų' => 'freemover',
                                   'Klausytojų EN' => 'freemoverEn',
                                   'Klausytojų dvikalbė (neformalaus mokslo)' => 'freemoverNonformal');

    private $agreementTypesByNo = array(5 => 'accomodation',
                                        7 => 'accomodationEn',
                                        14 => 'studies',
                                        15 => 'studies',
                                        12 => 'studiesEn',
                                        10 => 'freemover',
                                        13 => 'freemoverEn',
                                        11 => 'freemoverNonformal',
                                        20 => 'doctoral',
                                        21 => 'doctoralEn');

    private $freemoverBpoProgramosId = 99999;

    private $freemoverProgramPkods = 'l0000';

    private $freemocerStageType = 'B90501';

    private $documentTypes = array('' => '',
                                   'ATK' => 'ATK',
                                   'Pasas' => 'Pasas',);


    private $stageTypes = array('Baklauro' => 'B90400',
                                'Magistro' => 'B90300',
                                'Vientisųjų' => 'B90302',);

    private $financeTypes = array('VNF', 'VF');

    public function index (Request $request)
    {
        $year = date('Y');

        return view('agreement.createAgreement', ['year' => $year,
                                                        'agreementTypes' => $this->agreementTypes,
                                                        'documentTypes' => $this->documentTypes,
                                                        'stageTypes' => $this->stageTypes,
                                                        'financeTypes' => $this->financeTypes]);
    }

    public function save(Request $request){
        $documentTypes = $this->documentTypes;
        $agreementTypes = $this->agreementTypes;
        $stageTypes = $this->stageTypes;
        $financeTypes = $this->financeTypes;

        $validator = Validator::make($request->all(), [
            'person_code' => 'required|max:100',
            'name' => 'required|max:100',
            'surname' => 'required|max:100',
            'email' => 'max:100',
            'year' => 'numeric|max:2050',
            'birth_date' => 'nullable|date_format:Y-m-d',
            'phone' => 'max:100',
            'doc_no' => 'max:50',
            'price_year' => 'nullable|numeric|max:100000',
            'price_sem' => 'nullable|numeric|max:100000',
            'doc_type' => [Rule::in($documentTypes)],
            'address' => 'max:100',
            'agreement' => ['required', Rule::in($agreementTypes)],
            'stage_type' => ['required', Rule::in($stageTypes)],
            'finance' => ['required', Rule::in($financeTypes)],
            'program_id' => 'required|exists:luadm.bpo_programos,bpo_id',
        ]);

        if($validator->fails()){
            dd($validator->errors()->all());
        }

        $program_id = $request->program_id;
        $stage_type = $request->stage_type;
        $agreementNo = '';
        $agreement = new Agreement;

        switch ($request->agreement){
            case 'studies':
                switch ($request->stage_type){
                    case 'B90400':
                        $agreementNo = 'B'.$request->finance.'-'.date('y').'-';
                        $agreement->agreement_type_id = 14;
                        break;
                    case 'B90300':
                        $agreementNo = 'M'.$request->finance.'-'.date('y').'-';
                        $agreement->agreement_type_id = 15;
                        break;
                    case 'B90302':
                        $agreementNo = 'B'.$request->finance.'-'.date('y').'-';
                        $agreement->agreement_type_id = 14;
                        break;
                }
                break;
            case 'studiesEn':
                switch ($request->stage_type){
                    case 'B90400':
                        $agreementNo = 'B'.$request->finance.'-'.date('y').'-';
                        $agreement->agreement_type_id = 12;
                        break;
                    case 'B90300':
                        $agreementNo = 'M'.$request->finance.'-'.date('y').'-';
                        $agreement->agreement_type_id = 12;
                        break;
                    case 'B90302':
                        $agreementNo = 'B'.$request->finance.'-'.date('y').'-';
                        $agreement->agreement_type_id = 12;
                        break;
                }
                break;
            case 'freemover';
                $agreementNo = 'KL-'.date('y').'-';
                $agreement->agreement_type_id = 10;
                $program_id = $this->freemoverBpoProgramosId;
                $stage_type = $this->freemocerStageType;
                break;
            case 'freemoverEn':
                $agreementNo = 'KL-'.date('y').'-';
                $agreement->agreement_type_id = 13;
                $program_id = $this->freemoverBpoProgramosId;
                $stage_type = $this->freemocerStageType;
                break;
            case 'freemoverNonformal':
                $agreementNo = 'KL-'.date('y').'-';
                $agreement->agreement_type_id = 11;
                $program_id = $this->freemoverBpoProgramosId;
                $stage_type = $this->freemocerStageType;
                break;
        }

        $bpoPakviestiEsign = new BpoPakviestiEsign;
        $bpoProgramos = BpoProgramos::with('luadmProgramma')->find($program_id);

        if($lastAgreementNo = BpoPakviestiEsign::selectRaw('max(stud_sut_nr) as agreement_no')->where('stud_sut_nr', 'LIKE', $agreementNo.'%')->first()->agreement_no) {
            $agreementNo .= str_pad(substr($lastAgreementNo, strlen($lastAgreementNo) - 4) + 1 , 4, 0, STR_PAD_LEFT );
        } else {
            $agreementNo .= '0001';
        }

        $agreement->person_code = $request->person_code;
        $agreement->bpo_program_id = $bpoProgramos->bpo_id;
        $agreement->agreement_status = 'AS0001';
        $agreement->created_at = date('Y-m-d');
        $agreement->save();

        $bpoPakviestiEsign->vardas = $request->name;
        $bpoPakviestiEsign->pavarde = $request->surname;
        $bpoPakviestiEsign->asmens_kodas = $request->person_code;
        $bpoPakviestiEsign->gimimo_data = $request->birth_date;
        $bpoPakviestiEsign->pirmas_telef = $request->phone;
        $bpoPakviestiEsign->elpastas = $request->email;
        $bpoPakviestiEsign->gyvvieta = $request->address;
        $bpoPakviestiEsign->finansavimas = $request->finance;
        $bpoPakviestiEsign->metai = $request->year;
        $bpoPakviestiEsign->vdu_stud_pakopa_tkods = $stage_type;
        $bpoPakviestiEsign->vdu_pkods = $bpoProgramos->pp_vdu_pkods;
        $bpoPakviestiEsign->asmensdok = $request->doc_type;
        $bpoPakviestiEsign->asmensdoknr = $request->doc_no;
        $bpoPakviestiEsign->agreement_id = $agreement->id;
        $bpoPakviestiEsign->regnr = $request->price_year.'/'.$request->price_sem;
        $bpoPakviestiEsign->stud_sut_nr = $agreementNo;
        $bpoPakviestiEsign->vdu_sut_sablon = $request->agreement;
        $bpoPakviestiEsign->save();

        return $this->getAgreementPdf($agreement->id);
    }

    public function getAgreement(Request $request){
        $validator = Validator::make(['id' => $request->id], ['id' => 'required|numeric|exists:esp.agreement,id|exists:esp.bpo_pakviesti_esign,agreement_id']);

        if($validator->fails()){
            dd($validator->errors()->all());
        }

        return $this->getAgreementPdf($request->id);
    }

    public function getAgreementPdf($id){
        $agreement = Agreement::find($id);
        $bpoPakviestiEsign = BpoPakviestiEsign::where('agreement_id', $id)->first();
        $bpoProgramos = BpoProgramos::with('luadmProgramma')->find($agreement->bpo_program_id);

        $form = Tips::where('tkods', $bpoProgramos->luadmProgramma->tips_nodala)->first();
        $stage = Tips::where('tkods', $bpoPakviestiEsign->vdu_stud_pakopa_tkods)->first();

        $price = explode('/', $bpoPakviestiEsign->regnr);

        if ($price[0] == '') {
            $price[0] =  $bpoProgramos->pp_suma_year;
        }

        if ($price[1] == '') {
            $price[1] =  $bpoProgramos->pp_suma_semester;
        }

        $pdf = PDF::loadView('agreement.pdf.'.$this->agreementTypesByNo[$agreement->agreement_type_id], ['agreement' => $agreement,
            'bpoPakviestiEsign' => $bpoPakviestiEsign,
            'bpoProgramos' => $bpoProgramos,
            'yearPrice' => $price[0],
            'semesterPrice' => $price[1],
            'form' => $form,
            'stage' => $stage]);

        //$content = $pdf->output();
        //file_put_contents('C:\xampp2\htdocs\\'.$bpoPakviestiEsign->stud_sut_nr.'.pdf', $content);

        return $pdf->download('agreement.pdf');
    }

    public function programSearchItems(Request $request)
    {

        $programs = BpoProgramos::with('luadmProgramma')
                                  ->with('luadmProgramma.tipsLimenis')
                                  ->whereRaw("upper(pp_pavad) like upper('%".$request['search_phrase']."%')")
                                  ->orderBy('pp_metai', 'desc')
                                  ->get();

        return view('agreement.programSearch', ['programs' => $programs]);
    }

    public function nameSurnameByPersonCode(Request $request)
    {
        $person = Cilveks::select('vards as name', 'uzvards as surname', 'nod_gk_vieta as email')
            ->whereRaw("upper(pers_kods) = upper('".$request['search_phrase']."')")
            ->first();

        if(!($person)){
            $person = Users::select('name', 'surname', 'email')
                ->whereRaw("upper(pers_code) = upper('".$request['search_phrase']."')")
                ->first();
        }

        if(!($person)){
            $person = ['name' => '', 'surname' => '', 'email' => ''];
        }

        return response()->json($person);
    }
}
