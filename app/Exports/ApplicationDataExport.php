<?php

namespace App\Exports;

use App\Http\Services\SubmittedAppTableApplicationDataService;
use App\Models\Ekp\AdminTableTexts;
use App\Models\Ekp\ApplicationStructure;
use App\Models\Ekp\UserApplication;
use App\Models\Ekp\UserApplicationLine;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class ApplicationDataExport implements FromView, ShouldAutoSize
{
    /**
     * @var SubmittedAppTableApplicationDataService
     */
    private $dataService;
    /**
     * @var int
     */
    private $applicationId;
    /**
     * @var string
     */
    private $language;

    /**
     * ApplicationDataExport constructor.
     * @param SubmittedAppTableApplicationDataService $dataService
     * @param int $applicationId
     * @param string $language
     */
    public function __construct(SubmittedAppTableApplicationDataService $dataService, int $applicationId, string $language)
    {
        $this->dataService = $dataService;
        $this->applicationId = $applicationId;
        $this->language = $language;
    }

    public function view(): View
    {
        return view('excelExports.applicationsDataExport', [
             'applications' => $this->getAllApplicationData(),
             'headers' => $this->getHeadersForExcelExport($this->applicationId, $this->language)
        ]);
    }

    /**
     * @return array
     */
    public function getAllApplicationData(): array
    {
        $allApplications = UserApplication::where('application_id', $this->applicationId)->whereNotNull('user_id')->get(['id']);
        $appData = [];
        foreach ($allApplications as $app)
        {
            $userInfo = $this->dataService->getUserBaseInformation($app->id);
            $userInfoAnswerInfo = $this->getAllInformationFromUserApplication($app->id);
            $appData[$app->id] = array_merge($userInfo, $userInfoAnswerInfo);
        }
        return $appData;
    }

    /**
     * @param int $userAppId
     * @return array
     */
    public function getAllInformationFromUserApplication(int $userAppId): array
    {
        $appId = UserApplication::getAppIdFromUserAppId($userAppId);
        $classificatorCodes = $this->getApplicationStructureClassificatorCodes($appId);
        $userInfo = [];
        foreach($classificatorCodes as $code)
        {
            $userApplicationInfo = UserApplicationLine::where('user_application_id', $userAppId)
                ->with(['fieldClass', 'answerClass', 'answerTips'])
                ->where('classification_id', $code)
                ->where('user_application_id', $userAppId)
                ->get();
            $userInfo[$code] = array_values($this->dataService->getUserApplicationLineInfoFromApplication($userApplicationInfo, 'en'))[0] ?? '';
        }
        $userInfo['comment'] = AdminTableTexts::where('user_application_id', $userAppId)->first()->answer ?? '';
        return $userInfo;
    }

    /**
     * @param $applicationId
     * @param string $lang
     * @return array
     */
    public function getHeadersForExcelExport($applicationId, $lang = 'lt'): array
    {
        $userInfoHeadersLt = ['Vardas', 'Pavardė', 'Asmens kodas', 'El. paštas', 'Statusas', 'Teikimo data'];
        $userInfoHeadersEn = ['Name', 'Surname', 'Person code', 'Email', 'Status', 'Submittion date'];

        $applicationFields = ApplicationStructure::getApplicationFields($applicationId);
        $appHeaders = [];
        foreach ($applicationFields as $field)
        {
            $appHeaders[] = $lang === 'lt' ? $field->classification->text_lt : $field->classification->text_en;
        }
        $appHeaders[] = $lang === 'lt' ? 'Comment' : 'Komentaras';
        return $lang === 'lt' ? array_merge($userInfoHeadersLt, $appHeaders) : array_merge($userInfoHeadersEn, $appHeaders);
    }

    /**
     * @param $appId
     * @return array
     */
    public function getApplicationStructureClassificatorCodes($appId): array
    {
        $appStructure = ApplicationStructure::getApplicationFields($appId);
        $classificatorCodes = [];
        foreach ($appStructure as $field) {
            $classificatorCodes[] = $field->application_classification_id;
        }
        return $classificatorCodes;
    }
}
