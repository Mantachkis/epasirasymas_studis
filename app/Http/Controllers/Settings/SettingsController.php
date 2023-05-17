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

class SettingsController extends Controller
{

    /**
     * @param int|null $year
     * @return View
     */
    public function getMainView(?int $year = null): View
    {
        !is_null($year) ?: $year = date('Y');
        return view('settings.invitationsSettings', [
            'stages' => $this->getAdminStageInfo($year),
            'pedStages' => $this->getPedStageInfo($year),
            'year' => $year
        ]);
    }

    /**
     * @param int $year
     * @return Collection
     */
    private function getAdminStageInfo(int $year): Collection
    {
        return MasterStageAdmin::where('year', $year)->whereIn('stage', ['1','2','3'])->get();
    }

    /**
     * @param int $year
     * @return Collection
     */
    private function getPedStageInfo(int $year): Collection
    {
        return MasterStageAdmin::where('year', $year)->where('stage','like', '%PED')->get();
    }

    /**
     * @param $year
     * @param Request $req
     * @return RedirectResponse
     */
    public function update($year, Request $req): RedirectResponse
    {
      // dd($req->all());

        $pedStage = ['1PED','3PED'];
        for ($i = 1; $i <= 3; $i++) {
            $stage = MasterStageAdmin::where('year', $year)->where('stage', $i)->first();
            $this->setSettingsToDisabled($year, $i);
            $req->get('is_current')[0] == $i ? $stage->is_current = 'Y' : $stage->is_current = 'N';
            $stage->save();
        }
        if ($req->has('edit')) {
            foreach ($req->get('edit') as $edit) {
                $stage = MasterStageAdmin::where('year', $year)->where('stage', $edit)->first();
                $stage->edit = 'Y';
                $stage->save();
            }
        }
        if ($req->has('grades')) {
            foreach ($req->get('grades') as $grades) {
                $stage = MasterStageAdmin::where('year', $year)->where('stage', $grades)->first();
                $stage->grades = 'Y';
                $stage->save();
            }
        }
        if ($req->has('agreement')) {
            foreach ($req->get('agreement') as $agreement) {
                $stage = MasterStageAdmin::where('year', $year)->where('stage', $agreement)->first();
                $stage->agreement = 'Y';
                $stage->save();
            }
        }
        foreach ($req->get('valid_from') as $key => $val) {
            $stage = MasterStageAdmin::where('year', $year)->where('stage', $key + 1)->first();
            $stage->agreement_valid_from = $val;
            $stage->save();
        }

        foreach ($req->get('valid_until') as $key => $val) {
            $stage = MasterStageAdmin::where('year', $year)->where('stage', $key + 1)->first();
            $stage->agreement_valid_until = $val;
            $stage->save();
        }

        foreach ($pedStage as $pStage) {
            $stage = MasterStageAdmin::where('year', $year)->where('stage', $pStage)->first();
            $this->setSettingsToDisabled($year, $pStage);
            $req->get('ped-is_current')[0] == $pStage ? $stage->is_current = 'Y' : $stage->is_current = 'N';
            $stage->save();
        }

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
            $key=$key==0?$key=1:$key=3;
            $stage = MasterStageAdmin::where('year', $year)->where('stage', $key.'PED')->first();
            $stage->agreement_valid_from = $val;
            $stage->save();
        }

        foreach ($req->get('ped-valid_until') as $key => $val) {
            $key=$key==0?$key=1:$key=3;
            $stage = MasterStageAdmin::where('year', $year)->where('stage', $key.'PED')->first();
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
