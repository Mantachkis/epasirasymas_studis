<?php

namespace App\Http\Controllers\Settings;

use App\Models\Esp\Classification;
use App\Models\Esp\MasterSubjectCoef;
use App\Models\Esp\ProgramList;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CoeficientsController extends Controller
{
    public function getMainView(?int $year = null)
    {
        if(empty($year)) { $year = date('Y'); }
        return view('settings/masterCoeficients',[
            'year' => $year,
            'coeficients' => ProgramList::getProgramListWithCoefs($year)
        ]);
    }

    public function getProgramEditView(Request $req){

        return view('settings/partials/coefEditModalContent', [
            'program' => ProgramList::getProgramWithCoefs($req->get('programStateCode'), $req->get('year'),$req->get('pkods')),
            'coefList' => Classification::getCoeficientNameList(),
            'year' => $req->get('year')
        ]);
    }


    public function update(string $state_code, int $year,string $pkods, Request $req){
        if($state_code == '6310MX006'){
            MasterSubjectCoef::where('pkods', $pkods)->where('year', $year)->delete();
            for($i = 0; $i < count($req->get('coef')); $i++){
                if($req->get('coef')[$i] == null || $req->get('coef-sum')[$i] == null) { continue; }

                $coefRow = new MasterSubjectCoef;
                $coefRow->subject_code = $state_code;
                $coefRow->mark_code = $req->get('coef')[$i];
                $coefRow->coef = str_replace(',', '.', $req->get('coef-sum')[$i]);
                $coefRow->year = $year;
                $coefRow->pkods=$pkods;
                $coefRow->save();
            }
        }
        else{
            MasterSubjectCoef::where('subject_code', $state_code)->where('year', $year)->delete();
            for($i = 0; $i < count($req->get('coef')); $i++){
                if($req->get('coef')[$i] == null || $req->get('coef-sum')[$i] == null) { continue; }

                $coefRow = new MasterSubjectCoef;
                $coefRow->subject_code = $state_code;
                $coefRow->mark_code = $req->get('coef')[$i];
                $coefRow->coef = str_replace(',', '.', $req->get('coef-sum')[$i]);
                $coefRow->year = $year;
                $coefRow->save();
            }
        }

        return redirect(route('epasirasymas.settings.magistrai.koeficientai'))->with('alert-success', 'Programa atnaujinta');
    }

    public static function exportCoefsToNextYear(int $year){

        $coefs=MasterSubjectCoef::where('year',$year)->get();
        foreach($coefs as $coef){
            $newCoef=new MasterSubjectCoef();
            $newCoef->subject_code=$coef->subject_code;
            $newCoef->mark_code=$coef->mark_code;
            $newCoef->coef=$coef->coef;
            $newCoef->year=$year+1;
            $newCoef->pkods=$coef->pkods;
            $newCoef->save();
        }

    }
}
