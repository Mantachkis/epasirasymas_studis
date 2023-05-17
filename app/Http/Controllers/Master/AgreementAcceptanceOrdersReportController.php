<?php

namespace App\Http\Controllers\Master;

use App\Models\Esp\MasterStageAdmin;
use App\Models\Luadm\Strukturv;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Esp\ProgramList;

class AgreementAcceptanceOrdersReportController extends Controller
{
    public function getMainView()
    {
       
     
            $year = date('Y');
        
      
        $countPrograms=ProgramList::where('sp_metai',date('Y'))->count();
        if($countPrograms==0){
             $year = date('Y')-1;
        }
      
     
        return view('magistrai.agreementAcceptanceReport', [
            'faculties' => Strukturv::getFacultyList(),
            'stages' => MasterStageAdmin::getActiveStage($year),
            'year' => $year
        ]);
    }

    public function getMainViewWithReport(Request $req){
        $faculty = $req->get('faculty');
        $year = $req->get('year');
        $extra = $req->get('extra');
        $stage = $req->get('stage');
        $faculty = $this->replaceSymbols($faculty);

        //$priemimas = $this->getPriemimas($stage); TO DO needs to be phased out in the coming builds due to the URL being changed

        $url = 'http://andromeda.vdu.lt:7778/reports/rwservlet?priemim_sut_priedas&p_metai='.$year.'&p_priemimas='.'MG_'.$year.'_'.$stage.'&p_fak='.$faculty.'&priedas_nr='.$extra;
        return redirect($url);
    }

    public function replaceSymbols($str){
        $chs = array('Š' => 1, 'Ū' => 2, 'Ž' => 3, ' ' => 4);
        return strtr($str, $chs);
    }

    public function getPriemimas($stage){
        $arr = [
            '1' => 'MG_',
            '2' => 'MG2_',
            '3' => 'MG3_'
        ];

        return $arr[$stage];
    }
}
