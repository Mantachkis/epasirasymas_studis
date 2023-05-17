<?php

namespace App\Http\Controllers\Settings;

use App\Models\Esp\MasterStageAdmin;
use App\Http\Controllers\Controller;
use GuzzleHttp\Client;
use Illuminate\Contracts\View\View as View;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
class SettingsControllerPed extends Controller
{

    /**
     * @param int|null $year
     * @return View
     */
    public function getMainView(?int $year = null): View
    {
        !is_null($year) ?: $year = date('Y');
        return view('settings.invitationsSettingsPed', [

            'pedStages' => $this->getPedStageInfo($year),
            'year' => $year
        ]);
    }

    /**
     * @param int $year
     * @return Collection
     */
//
    /**
     * @param int $year
     * @return Collection
     */
    private function getPedStageInfo(int $year): Collection
    {
        return MasterStageAdmin::where('year', $year)->whereIn('stage', 'PED')->get();
    }

    /**
     * @param $year
     * @param Request $req
     * @return RedirectResponse
     */
    public function update($year, Request $req): RedirectResponse
    {
//        dd( $req->get('ped-is_current')[0]);
        $pedStage = 'PED';


        $this->setSettingsToDisabled($year, $pedStage);
        if ($req->has('ped-edit')) {
            foreach ($req->get('ped-edit') as $edit) {
                $stage = MasterStageAdmin::where('year', $year)->where('stage', $edit)->first();
                $stage->edit = 'Y';
                $stage->save();
            }
        }
        if ($req->has('ped-grades')) {
            foreach ($req->get('ped-grades') as $grades) {
                $stage = MasterStageAdmin::where('year', $year)->where('stage', $grades)->first();
                $stage->grades = 'Y';
                $stage->save();
            }
        }
        if ($req->has('ped-agreement')) {
            foreach ($req->get('ped-agreement') as $agreement) {
                $stage = MasterStageAdmin::where('year', $year)->where('stage', $agreement)->first();
                $stage->agreement = 'Y';
                $stage->save();
            }
        }
        foreach ($req->get('ped-valid_from') as $key => $val) {
            $stage = MasterStageAdmin::where('year', $year)->where('stage', 'PED')->first();
            $stage->agreement_valid_from = $val;
            $stage->save();
        }

        foreach ($req->get('ped-valid_until') as $key => $val) {
            $stage = MasterStageAdmin::where('year', $year)->where('stage', 'PED')->first();
            $stage->agreement_valid_until = $val;
            $stage->save();
        }
        return redirect()->back()->with('alert-success', 'Nustatymai išsaugoti');
    }

    private function setSettingsToDisabled(int $year, string $stage): void
    {
        $masterStage = MasterStageAdmin::where('year', $year)->where('stage', $stage)->first();
        $masterStage->edit = 'N';
        $masterStage->grades = 'N';
        $masterStage->agreement = 'N';

        $masterStage->save();
    }
}

