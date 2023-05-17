<?php

namespace App\Http\Controllers;

use App\Exports\ApplicationDataExport;
use App\Http\Services\SubmittedAppTableApplicationDataService;
use App\Models\Ekp\AdminTableTexts;
use App\Models\Ekp\Application;
use App\Models\Ekp\ApplicationStructure;
use App\Models\Ekp\UserApplication;
use App\Models\Ekp\UserApplicationLine;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class SubmittedAppTableController extends Controller
{
    /**
     * @var SubmittedAppTableApplicationDataService
     */
    private $dataService;


    /**
     * SubmittedAppTableController constructor.
     * @param SubmittedAppTableApplicationDataService $dataService
     */
    public function __construct(SubmittedAppTableApplicationDataService $dataService)
    {
        $this->dataService = $dataService;
    }

    public function getMainView(int $templateId)
    {
        $newestApplicationId = Application::getNewestAppIdFromTemplate($templateId);
        return view('submittedApplications.submittedAppTableBase', [
            'applicants' => $this->dataService->getAllUserInformationFromApplication($newestApplicationId),
            'tableFields' => $this->dataService->getTemplatesCustomFieldsForTable($templateId),
            'emailFormData' => $this->dataService->getEmailTemplateData($templateId),
            'applicationName' => $this->dataService->getApplicationName($newestApplicationId),
            'applicationId' => $newestApplicationId
        ]);
    }

    public function getSubmittedApplication(int $userApplicationId)
    {
        $applicationId = UserApplication::getAppIdFromUserAppId($userApplicationId);
        return view('submittedApplications.submittedUserApplication', [
            'applicationFields' => ApplicationStructure::getApplicationFields($applicationId),
            'userFields' => UserApplicationLine::getUserApplicationInfo($userApplicationId),
            'userInfo' => UserApplication::getUserInfo($userApplicationId),
            'lang' => $this->dataService->getApplicationLanguage($applicationId),
            'appId' => $userApplicationId,
        ]);
    }

    public function submittedApplicationLock(UserApplication $userApplication) {
        $userApplication->app_status = 'AS0003';
        $userApplication->save();
        return redirect()->back()->with('alert-success', 'Prašymas patvirtintas');
    }

    public function submittedApplicationUnlock(UserApplication $userApplication) {
        $userApplication->app_status = 'AS0001';
        $userApplication->save();
        return redirect()->back()->with('alert-success', 'Prašymas atrakintas');
    }

    /**
     * @param int $applicationId
     * @return BinaryFileResponse
     */
    public function exportApplicationUserInfoDataToExcel(int $applicationId): BinaryFileResponse
    {
        $appLang = $this->dataService->getApplicationLanguage($applicationId);
        return Excel::download(new ApplicationDataExport($this->dataService, $applicationId, $appLang), 'AppData.xlsx');
    }

    public function saveComment(Request $req)
    {
        $userAdminText = AdminTableTexts::firstOrNew(['user_application_id' => $req->get('user-application-id')]);
        $userAdminText->user_application_id = $req->get('user-application-id');
        $userAdminText->answer = $req->get('comment');
        $userAdminText->submit_date = date('Y-m-d');
        $userAdminText->submit_user = auth()->user()->username;

        $userAdminText->save();

        return redirect()->back()->with('alert-success', 'Komentaras išsaugotas');
    }
}
