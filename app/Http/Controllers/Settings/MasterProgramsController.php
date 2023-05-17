<?php

namespace App\Http\Controllers\Settings;

use App\Models\Ekp\Application;
use App\Models\Esp\MasterStageAdmin;
use App\Models\Esp\ProgramList;
use App\Http\Controllers\Controller;
use App\Models\Luadm\Programma;
use App\Models\Esp\MasterSubjectCoef;
use App\Http\Controllers\Settings\CoeficientsController;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class MasterProgramsController extends Controller
{
    /**
     * @param int|null $year
     * @param int|null $stage
     * @return Factory|View
     */
    public function getMainView(?int $year = null, ?int $stage = null): View
    {
        if (empty($year)) {
            $year = date('Y');
        }

        $countPrograms=ProgramList::where('sp_metai',date('Y'))->count();
        if($countPrograms==0){
             $year = date('Y')-1;
        }
  if (empty($stage)) {
            $stage = MasterStageAdmin::getActiveStage($year);
        }
        return view('settings.masterPrograms', [
            'programs' => ProgramList::getAllMasterProgramsByStageAndYear($year, $stage),
            'year' => $year,
            'stage' => $stage,
            'countPrograms'=>$countPrograms
        ]);
    }

    /**
     * @param Request $req
     * @return View
     */
    public function getProgramModalContent(Request $req): View
    {
             $active = 0;
        $aplication = Application::where('year', date("Y"))->where('agreement_template', 2)->get();
        foreach ($aplication as $app) {

            if ($app->start_date <= date('Y-m-d H:i:s') && $app->end_date >= date('Y-m-d H:i:s')){
            $active = 1;
            }

        }


        return view('settings.partials.programEditContent', [
            'program' => ProgramList::where([
                'sp_metai' => $req->get('year'),
                'sp_progr_id' => $req->get('pkods'),
                'sp_etapas' => $req->get('stage')
            ])->first(),
            'year' => $req->get('year'),
            'active'=>$active
        ]);
    }

    /**
     * @return Factory|View
     */
    public function getProgramCreateBaseView(): View
    {
        return view('settings.programCreate');
    }

    /**
     * @param Request $req
     * @return View
     */
    public function getProgramCreateView(Request $req): View
    {
        $programs = Programma::with([
            'tipsNodala' => function ($q) {
                $q->select(['tkods', 'tnosauk']);
            }
        ])->with([
            'strukturvStkods' => function ($q) {
                $q->select(['stkods', 'stnosauk']);
            }
        ])->whereRaw('lower(pnosauk) like ?', ['%' . mb_strtolower($req->get('program-name')) . '%'])
            ->whereIn('tips_limenis', 'B90300','')
            ->orderBy('pnosauk')->get();

        return view('settings.programCreate', [
            'programs' => $programs
        ]);
    }

    /**
     * @param $pkods
     * @param Request $req
     * @return RedirectResponse
     */
    public function update($pkods, Request $req): RedirectResponse
    {
        $year = $req->get('year');
        $stage = $req->get('stage');
        $programList = ProgramList::where('sp_progr_id', $pkods)
            ->where('sp_metai', $year)
            ->when(!$req->has('all-stages'), function ($q) use ($stage) {
                $q->where('sp_etapas', $stage);
            })
            ->get();

        foreach ($programList as $key => $prog) {
            $stage = $prog->sp_etapas;
            $prog->sp_progr_pavad = $req->get('name');
            $prog->sp_kvota_vf = $req->get('paid-quota');
            $prog->sp_kvota_vnf = $req->get('unpaid-quota');
            $prog->sp_valst_kodas = $req->get('code');
            $prog->sp_minimali_kvota = $req->get('minimal-quota');
            $prog->sp_kaina = $req->get('price');
            if ($req->get('status') == 'Y') {
                $prog->sp_priemimas = 'MG_' . $year . '_' . $stage;
            } else {
                $prog->sp_priemimas = null;
            }
            if ($req->get('suspended') == 'Y') {
                $prog->sp_stabdomas_priemimas = 'Y';
            } else {
                $prog->sp_stabdomas_priemimas = null;
            }
            $prog->save();
        }

        return redirect()->back()->with('alert-success', 'Programa atnaujinta');
    }

    /**
     * @param int $year
     * @return RedirectResponse
     */
    public function export(int $year): RedirectResponse
    {
        CoeficientsController::exportCoefsToNextYear($year);

        $programs = ProgramList::where(['sp_metai' => $year])
            ->where(function ($query) use ($year) {
                $query->where('sp_priemimas', '=', 'MG_' . $year . '_1')
                    ->orWhere('sp_priemimas', '=', 'MG_' . $year . '_1PED');
            })
            ->get();
        for ($i=1;$i<=3;$i++){
        foreach ($programs as $program) {
            $prog = new ProgramList([
                'sp_progr_id' => $program->sp_progr_id,
                'sp_progr_pavad' => $program->sp_progr_pavad,
                'sp_kvota_vf' => $program->sp_kvota_vf,
                'sp_kvota_vnf' => $program->sp_kvota_vnf,
                'sp_minimali_kvota'=>$program->sp_minimali_kvota,
                'sp_metai' => $program->sp_metai + 1,
                'sp_valst_kodas' => $program->sp_valst_kodas,
                'sp_priemimas' => 'MG_' . ($program->sp_metai + 1) . '_'.$i,
                'sp_kaina' => $program->sp_kaina,
                'sp_koment' => $program->sp_koment,
                'sp_etapas' => $i
            ]);

            $prog->save();}
        }
        return redirect()->back()->with('alert-success', 'Programos sekmingai užkeltos į sekančius metus');
    }

    /**
     * @param Request $req
     * @return RedirectResponse
     */
    public function create(Request $req): RedirectResponse
    {
        $stage = $req->get('stage');
        $currentYear = date('Y');

        if (is_null($stage)) {
            for ($i = 1; $i <= 3; $i++) {
                $program = new ProgramList([
                    'sp_progr_id' => trim($req->get('pkods')),
                    'sp_progr_pavad' => trim($req->get('name')),
                    'sp_kvota_vf' => trim($req->get('paid-quota')),
                    'sp_kvota_vnf' => trim($req->get('unpaid-quota')),
                    'sp_minimali_kvota' => trim($req->get('minimal-quota')),
                    'sp_metai' => $currentYear,
                    'sp_valst_kodas' => trim($req->get('code')),
                    'sp_priemimas' => 'MG_' . $currentYear . '_' . $i,
                    'sp_kaina' => trim($req->get('price')),
                    'sp_koment' => '',
                    'sp_etapas' => $i
                ]);
                $program->save();
            }
        } else {
            $program = new ProgramList([
                'sp_progr_id' => trim($req->get('pkods')),
                'sp_progr_pavad' => trim($req->get('name')),
                'sp_kvota_vf' => trim($req->get('paid-quota')),
                'sp_kvota_vnf' => trim($req->get('unpaid-quota')),
                'sp_minimali_kvota' => trim($req->get('minimal-quota')),
                'sp_metai' => $currentYear,
                'sp_valst_kodas' => trim($req->get('code')),
                'sp_priemimas' => 'MG_' . $currentYear . '_' . $stage,
                'sp_kaina' => trim($req->get('price')),
                'sp_koment' => '',
                'sp_etapas' => $stage
            ]);
            $program->save();
        }
        return redirect()->back()->with('alert-success', 'Programa sukurta');
    }
}

