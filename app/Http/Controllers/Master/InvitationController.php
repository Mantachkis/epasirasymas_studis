<?php

namespace App\Http\Controllers\Master;

use App\Mail\MastersInviteMail;
use App\Models\Esp\Agreement;
use App\Models\Esp\BpoPakviestiEsign;
use App\Models\Esp\MasterInfo;
use App\Models\Esp\MasterRequestList;
use App\Models\Esp\MasterStageAdmin;
use App\Models\Esp\MasterSubjectCoef;
use App\Models\Esp\ProgramList;
use App\Http\Controllers\Controller;
use App\Models\Luadm\LuserDept;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class InvitationController extends Controller
{
    public function getMainView()
    {
//        dd(LuserDept::getUserFaculties());
        $year =date('Y');
        $stage = MasterStageAdmin::getActiveStage($year);
        return view('magistrai/invitationsBase',[
            'programs' => ProgramList::getActiveProgramListByYearAndStage($year, LuserDept::getUserFaculties(), $stage),
            'year' => $year,
            'stage' => $stage,
            'subsite' => 'konkursine_eile'
        ]);
    }

    public function getMainViewWithYear(int $year)
    {
        $stage = MasterStageAdmin::getActiveStage($year);
        return view('magistrai/invitationsBase',[
            'programs' => ProgramList::getActiveProgramListByYearAndStage($year, LuserDept::getUserFaculties(), $stage),
            'year' => $year,
            'subsite' => 'konkursine_eile'
        ]);
    }

    public function getMainViewFull(int $year, string $program, string $stage)
    {
        return view('magistrai/invitationsBase',[
            'programs' => ProgramList::getActiveProgramListByYearAndStage($year, LuserDept::getUserFaculties(), $stage),
            'year' => $year,
            'students' => MasterRequestList::getInvitedStudentList($year, $program, $stage),
            'uninvitedStudents' => MasterRequestList::getUninvitedStudentList($year, $program, $stage),
            'program' => $program,
            'stage' => !ProgramList::isProgramPed($program) ? $stage : $stage = $stage.'PED',
            'coefs' => MasterSubjectCoef::getSubjectCoefs($program, $year),
            'subsite' => 'konkursine_eile'
        ]);
    }

    public function formAgreementUninvited(Request $req){
        if(!$req->has('finance-type')) { return redirect()->back()->with('alert-danger', 'Sutartis nesuformuota, nebuvo pasirinktas finansavimas'); }

        $masterInfoId = MasterRequestList::where('id', $req->get('id'))->first()->master_info_id;

        MasterRequestList::updateFinanceType($req->get('id'), $req->get('finance-type'));

        $agreementId = Agreement::store($masterInfoId, 2);

        $bpo = new BpoPakviestiEsign;
        $bpo->store($req->get('id'), $masterInfoId, $agreementId);

        Mail::send(new MastersInviteMail(MasterInfo::where('id', $masterInfoId)->first()->email));

        return redirect()->back()->with('alert-success', 'Sutartis suformuota ir išsiųstas pakvietimo laiškas');
    }

    public function formAgreementInvited(MasterRequestList $reqList)
    {

        $masterInfoId = $reqList->master_info_id;
        $agreementId = Agreement::store($masterInfoId, 2);

        $bpo = new BpoPakviestiEsign;
        $bpo->store($reqList->id, $masterInfoId, $agreementId);

        Mail::send(new MastersInviteMail(MasterInfo::where('id', $masterInfoId)->first()->email));

        return redirect()->back()->with('alert-success', 'Sutartis suformuota ir išsiųstas pakvietimo laiškas');
    }

    /**
     * @param MasterRequestList $reqList
     * @return \Illuminate\Http\RedirectResponse
     * Stabdyti pasirasymo laika
     */
    public function stopAgreement(MasterRequestList $reqList, Request $request)
    {
        $reqList->admin_comment = $request->get('stop-reason-input');
        $reqList->save();

        $agreementId = BpoPakviestiEsign::where('master_req_id', $reqList->id)->first()->agreement_id;
        $agreement = Agreement::where('id', $agreementId)->first();
        $agreement->agreement_status = 'AS0004';
        $agreement->save();

        return redirect()->back()->with('alert-success', 'Sutarties pasirašymo laikas buvo sustabdytas');
    }

    /**
     * @param MasterRequestList $reqList
     * @return \Illuminate\Http\RedirectResponse
     * Nutraukti sutarti
     */
    public function terminateAgreement(MasterRequestList $reqList, Request $request)
    {
        $reqList->admin_comment = $request->get('terminate-reason-input');
        $reqList->save();

        $agreementId = BpoPakviestiEsign::where('master_req_id', $reqList->id)->first()->agreement_id;
        $agreement = Agreement::where('id', $agreementId)->first();
        $agreement->agreement_status = 'AS0003';
        $agreement->save();

        return redirect()->back()->with('alert-success', 'Sutartis buvo nutraukta');
    }

    public function getStopAgreementModalContent(MasterRequestList $reqList)
    {
        return view('magistrai/partials/agreementCancelModalContent', [
            'masterReqList' => $reqList
        ]);
    }

    public function getTerminateAgreementModalContent(MasterRequestList $reqList)
    {
        return view('magistrai.partials.agreementTerminateModalContent', [
           'masterReqList' => $reqList
        ]);
    }
}
