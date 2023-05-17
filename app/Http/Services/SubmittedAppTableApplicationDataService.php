<?php


namespace App\Http\Services;


use App\DataTypes\EmailTemplateDataType;
use App\Models\Ekp\AdminTableTexts;
use App\Models\Ekp\Application;
use App\Models\Ekp\ApplicationFiles;
use App\Models\Ekp\Classification;
use App\Models\Ekp\UserApplication;
use App\Models\Ekp\UserApplicationLine;
use App\Models\Luadm\Karto;
use App\Models\Luadm\Studijas;
use Illuminate\View\View;

class SubmittedAppTableApplicationDataService
{
    /**
     * @param int $templateId
     * @return array
     */
    public function getTemplatesCustomFieldsForTable(int $templateId): array
    {
        $arr = [
            // Priėmimo į Bakalauro ir vientisąsias studijas forma
            1 => [
                'name' => 'Vardas',
                'surname' => 'Pavardė',
                'persCode' => 'Asmens kodas',
                'email' => 'El. paštas',
                'subjectChoices' => 'Pasirinkimai',
                'submitDate' => 'Data',
                'customFields' => []
            ],
            // Incoming-Application for Erasmus Study Exchange
            3 => [
                'name' => 'Vardas',
                'surname' => 'Pavardė',
                'persCode' => 'Asmens kodas',
                'email' => 'El. paštas',
                'submitDate' => 'Teikimo data',
                'confirmationStatus' => 'Patvirtinta',
                'MLT0012' => 'Lytis',
                'INFO0004' => 'Pilietybė',
                'MLT0011' => 'Studijų pakopa',
                'MLT0008' => 'Fakultetas',
                'INFO0122' => 'Semestras',
                'INFO0106' => 'Siunčianti institucija',
                'INFO0130' => 'Institucijos šalis',
                'customFields' => [
                    'areGradesEntered' => 'Balų suvedimas',
                    'applicantFileAmount' => 'Pridėtų failų kiekis',
                    'workerAddedFileAmount' => 'VDU pridėtų failų kiekis'
                ],
                'buttons' => [
                    'email' => 'Paspaudus atsidarys laiško išsiuntimo forma',
                    'erasmusFileAdd' => 'Paspaudus atsidarys failų pridėjimo langas'
                ]

            ],
            // Outgoing-Application for Traineeship (non-EU countries)
            24 => [
                'name' => 'Vardas',
                'surname' => 'Pavardė',
                'persCode' => 'Asmens kodas',
                'email' => 'El. paštas',
                'submitDate' => 'Teikimo data',
                'MLT0012' => 'Lytis',
                'INFO0004' => 'Pilietybė',
                'MLT0011' => 'Studijų pakopa',
                'MLT0008' => 'Fakultetas',
                'customFields' => []
            ],
            // Outgoing-Application for Erasmus Study Exchange (EU countries)
            25 => [
                'name' => 'Vardas',
                'surname' => 'Pavardė',
                'persCode' => 'Asmens kodas',
                'email' => 'El. paštas',
                'submitDate' => 'Teikimo data',
                'MLT0012' => 'Lytis',
                'INFO0004' => 'Pilietybė',
                'MLT0011' => 'Studijų pakopa',
                'MLT0008' => 'Fakultetas',
                'customFields' => []
            ],
            // Scholarship Application Form for Prospective Degree Studies
            192 => [
                'name' => 'Vardas',
                'surname' => 'Pavardė',
                'submitDate' => 'Teikimo data',
                'INFO0692' => 'Stipendijos tipas',
                'MLT0012' => 'Lytis',
                'INFO0004' => 'Pilietybė',
                'INFO0121' => 'Šalis',
                'MLT0011' => 'Studijų pakopa',
                'MLT0008' => 'Fakultetas/Akademija',
                'INFO0688' => 'Programa',
                'email' => 'El. paštas',
                'confirmationStatus' => 'Statusas',
                'customFields' => [
                    'applicantFileAmount' => 'Pridėtų failų kiekis',
                    'comment' => 'Komentaras'
                ],
                'buttons' => [
                    'commentAdd' => 'Paspaudus atsivers komentaro įvedimo langas'
                ]
            ],
            222 => [
                'name' => 'Vardas',
                'surname' => 'Pavardė',
                'submitDate' => 'Teikimo data',
                'MLT0012' => 'Lytis',
                'INFO0004' => 'Pilietybė',
                'INFO0121' => 'Šalis',
                'MLT0011' => 'Studijų pakopa',
                'MLT0008' => 'Fakultetas/Akademija',
                'email' => 'El. paštas',
                'confirmationStatus' => 'Statusas',
                'customFields' => [
                    'applicantFileAmount' => 'Pridėtų failų kiekis',
                    'comment' => 'Komentaras'
                ],
                'buttons' => [
                    'commentAdd' => 'Paspaudus atsivers komentaro įvedimo langas'
                ]
            ],
            //Application Form for English Foundation Courses at VMU
            223 => [
                'name' => 'Vardas',
                'surname' => 'Pavardė',
                'submitDate' => 'Teikimo data',
                'MLT0012' => 'Lytis',
                'INFO0004' => 'Pilietybė',
                'email' => 'El. paštas',
                'INFO0005' => 'Telefonas',
                'INFO0055' => 'Passport ID',
                'INFO0726' => 'PREP-course semester',
                'MLT0003' => 'Education',
                'INFO0727' => 'Preferred course',
                'INFO0728' => 'Kita kalba',
                'INFO0725' => 'Native language',
                'INFO0242' => 'First  language',
                'INFO0248' => 'First knowledge',
                'INFO0243' => 'Second language',
                'INFO0249' => 'Second knowledge',
                'INFO0244' => 'Third language',
                'INFO0250' => 'Third knowledge',
                'INFO0245' => 'Fourth language',
                'INFO0251' => 'Fourth knowledge',
                'INFO0246' => 'Fifth language',
                'INFO0252' => 'Fifth knowledge',
                'INFO0188' => 'Name of host organization',
                'INFO0190' => 'Organization web page',
                'INFO0191' => 'Organization country',
                'INFO0192' => 'Organization city',
                'INFO0062' => 'Passport copy',
                'confirmationStatus' => 'Statusas',
                'customFields' => [
                    'applicantFileAmount' => 'Pridėtų failų kiekis',
                    'comment' => 'Komentaras'
                ],
                'buttons' => [
                    'commentAdd' => 'Paspaudus atsivers komentaro įvedimo langas'
                ]
            ],
            //Application Form for Online PREP-Course (For Individual Participants)
            224 => [
                'name' => 'Vardas',
                'surname' => 'Pavardė',
                'submitDate' => 'Teikimo data',
                'MLT0012' => 'Lytis',
                'INFO0004' => 'Pilietybė',
                'email' => 'El. paštas',
                'INFO0005' => 'Telefonas',
                'INFO0055' => 'Passport ID',
                'INFO0726' => 'PREP-course semester',
                'MLT0003' => 'Education',
                'INFO0727' => 'Preferred course',
                'INFO0728' => 'Kita kalba',
                'INFO0725' => 'Native language',
                'INFO0242' => 'First  language',
                'INFO0248' => 'First knowledge',
                'INFO0243' => 'Second language',
                'INFO0249' => 'Second knowledge',
                'INFO0244' => 'Third language',
                'INFO0250' => 'Third knowledge',
                'INFO0245' => 'Fourth language',
                'INFO0251' => 'Fourth knowledge',
                'INFO0246' => 'Fifth language',
                'INFO0252' => 'Fifth knowledge',
                'INFO0188' => 'Name of host organization',
                'INFO0190' => 'Organization web page',
                'INFO0191' => 'Organization country',
                'INFO0192' => 'Organization city',
                'INFO0062' => 'Passport copy',
                'confirmationStatus' => 'Statusas',
                'customFields' => [
                    'applicantFileAmount' => 'Pridėtų failų kiekis',
                    'comment' => 'Komentaras'
                ],
                'buttons' => [
                    'commentAdd' => 'Paspaudus atsivers komentaro įvedimo langas'
                ]
            ],
            //PREP-Course Application Form (For Participants From Organised Groups)
            225 => [
                'name' => 'Vardas',
                'surname' => 'Pavardė',
                'submitDate' => 'Teikimo data',
                'MLT0012' => 'Lytis',
                'INFO0004' => 'Pilietybė',
                'email' => 'El. paštas',
                'INFO0005' => 'Telefonas',
                'INFO0055' => 'Passport ID',
                'INFO0726' => 'PREP-course semester',
                'MLT0003' => 'Education',
                'INFO0727' => 'Preferred course',
                'INFO0728' => 'Kita kalba',
                'INFO0725' => 'Native language',
                'INFO0242' => 'First  language',
                'INFO0248' => 'First knowledge',
                'INFO0243' => 'Second language',
                'INFO0249' => 'Second knowledge',
                'INFO0244' => 'Third language',
                'INFO0250' => 'Third knowledge',
                'INFO0245' => 'Fourth language',
                'INFO0251' => 'Fourth knowledge',
                'INFO0246' => 'Fifth language',
                'INFO0252' => 'Fifth knowledge',
                'INFO0188' => 'Name of host organization',
                'INFO0190' => 'Organization web page',
                'INFO0191' => 'Organization country',
                'INFO0192' => 'Organization city',
                'INFO0062' => 'Passport copy',
                'confirmationStatus' => 'Statusas',
                'customFields' => [
                    'applicantFileAmount' => 'Pridėtų failų kiekis',
                    'comment' => 'Komentaras'
                ],
                'buttons' => [
                    'commentAdd' => 'Paspaudus atsivers komentaro įvedimo langas'
                ]
            ]
        ];
        return $arr[$templateId];
    }

    /**
     * @param int $userApplicationId
     * @return array
     */
    public function getUserBaseInformation(int $userApplicationId): array
    {
        $userInfo = UserApplication::with(['user' => function($q) {
            $q->with('luadmCilveksCkods');
        }])->where('id', $userApplicationId)->first();

        switch($userInfo->app_status) {
            case 'AS0001':
                $confirmationStatus = 'Pateikta';
            break;
            case 'AS0004':
                $confirmationStatus = 'Atmesta';
            break;
            case 'AS0003':
                $confirmationStatus = 'Patvirtinta';
            break;
        }
		
		if($userInfo->user->luadmCilveksCkods) {
			$cil_www = $userInfo->user->luadmCilveksCkods->cil_www;
		} else {
			$cil_www = null;	
		}

        return [
            'name' => $userInfo->user->name ?? $userInfo->user->luadmCilveksCkods->vards ?? 'Nerastas vardas',
            'surname' => $userInfo->user->surname ?? $userInfo->user->luadmCilveksCkods->uzvards ?? 'Nerasta pavardė',
            'persCode' => $userInfo->user->pers_code ?? $userInfo->user->luadmCilveksCkods->pers_kods ?? 'Nerastas asmens kodas',
            'email' => $userInfo->user->email ?? $userInfo->user->luadmCilveksCkods->nod_gk_vieta ?? $cil_www .'@vdu.lt' ?? 'Nerastas el. paštas',
            'confirmationStatus' => $confirmationStatus,
            'submitDate' => date('Y-m-d', strtotime($userInfo->submit_date))
        ];
    }

    /**
     * @param string $field
     * @param int $userApplicationId
     * @return mixed|string|null
     */
    public function getCustomApplicationFieldInformation(string $field, int $userApplicationId)
    {
        switch($field) {
            case 'areGradesEntered':
                $this->checkIfGradesEntered($userApplicationId) ? $a = '<i class="fas fa-check" style="color:green"></i>' : $a = '<i class="fas fa-times" style="color:red"></i>';
            break;
            case 'applicantFileAmount':
                $a = $this->getAddedFileCount($userApplicationId);
            break;
            case 'workerAddedFileAmount':
                $a = $this->getAddedFilesByWorkersCount($userApplicationId);
            break;
            case 'comment':
                $a = $this->getComment($userApplicationId);
            break;
            default:
                return null;
        }

        return $a;
    }

    /**
     * @param int $userApplication
     * @param int $templateId
     * @return array
     */
    public function getAllCustomInformationFromUser(int $userApplication, int $templateId): array
    {
        $infoArr = [];
        $customFields = $this->getTemplatesCustomFieldsForTable($templateId)['customFields'];

        foreach ($customFields as $key => $val)
        {
            $infoArr[$key] = $this->getCustomApplicationFieldInformation($key, $userApplication);
        }

        return $infoArr;
    }

    /**
     * @param int $userApplicationId
     * @param int $templateId
     * @return array
     */
    public function getTemplateCustomFieldInformationFromUser(int $userApplicationId, int $templateId): array
    {
        $userInfo = UserApplicationLine::with(['fieldClass', 'answerClass', 'answerTips'])
            ->where('user_application_id', $userApplicationId)
            ->whereIn('classification_id', array_keys($this->getTemplatesCustomFieldsForTable($templateId)))
            ->get();

        return $this->getUserApplicationLineInfoFromApplication($userInfo);
    }

    /**
     * @param int $userApplicationId
     * @return mixed
     */
    public function getTemplateIdFromUserApplicationId(int $userApplicationId)
    {
        $userApplication = UserApplication::where('id', $userApplicationId)->first();
        return Application::where('id', $userApplication->application_id)->first()->agreement_template;
    }

    /**
     * @param int $applicationId
     * @return array
     */
    public function getAllUserInformationFromApplication(int $applicationId): array
    {
        $templateId = Application::where('id', $applicationId)->first()->agreement_template;
        $userIdList = UserApplication::where('application_id', $applicationId)->whereNotNull('user_id')->get(['id']);
        $userInfoList = [];
        foreach($userIdList as $userId)
        {
            $userBaseInfo = $this->getUserBaseInformation($userId->id);
            $userTemplateInfo = $this->getTemplateCustomFieldInformationFromUser($userId->id, $templateId);
            $userCustomFieldInfo = $this->getAllCustomInformationFromUser($userId->id, $templateId);
            $userInfoList[$userId->id] = array_merge($userBaseInfo, $userTemplateInfo, $userCustomFieldInfo);
        }
        return $userInfoList;
    }

    /**
     * @param int $userApplicationId
     * @return mixed
     */
    public function getAddedFileCount(int $userApplicationId)
    {
        return UserApplicationLine::whereHas('fieldAppStructure' , function($q){
            $q->where('type', 'FTYP0006');
        })->where('user_application_id', $userApplicationId)->count();
    }

    /**
     * @param int $userApplicationId
     * @return mixed
     */
    public function getAddedFilesByWorkersCount(int $userApplicationId)
    {
        return ApplicationFiles::where('user_application_id', $userApplicationId)->count();
    }

    /**
     * @param int $userApplicationId
     * @return bool
     */
    public function checkIfGradesEntered(int $userApplicationId): bool
    {
        $userApplication = UserApplication::with('user')->where('id', $userApplicationId)->first();

        if(is_null($userApplication->user->ckods)) {
            return false;
        }

        $ckods = $userApplication->user->ckods;
        $studkods = Studijas::where('cilveks_ckods', $ckods)->first()->studkods ?? null;

        if($studkods === null) {
            return false;
        }

        $subjectCount = Karto::where('stud_studkods', $studkods)->count();

        if($subjectCount === 0) {
            return false;
        }

        $gradeCount = Karto::where('stud_studkods', $studkods)->whereNotNull('atzime')->count();

        return $subjectCount === $gradeCount;
    }

    /**
     * @param int $templateId
     * @return View
     */
    public function getEmailTemplateByTemplateId(int $templateId): View
    {
        switch($templateId) {
            case 1: return view('emailContent.preBachelorAcceptanceMail');
            case 3: return view('emailContent.erasmusAcceptanceMail');
            default: return view('emailContent.defaultMailText');
        }
    }

    /**
     * @param int $templateId
     * @return string|null
     */
    public function getEmailTemplateSubjectByTemplateId(int $templateId): ?string
    {
        switch ($templateId) {
            case 1: return "Kvietimas studijuoti VDU";
            case 3: return "Letter of Acceptance for Erasmus studies at Vytautas Magnus University";
            default: return "";
        }
    }

    /**
     * @param int $templateId
     * @return string|null
     */
    public function getEmailTemplateSenderByTemplateId(int $templateId): ?string
    {
        switch ($templateId) {
            case 1: return "noreply@vdu.lt (Vytauto Didžiojo universitetas)";
            case 3: return "international@vdu.lt (Vytautas Magnus University)";
            default: return "noreply@vdu.lt (Vytauto Didžiojo universitetas)";
        }
    }

    /**
     * @param int $templateId
     * @return EmailTemplateDataType
     * @throws \Throwable
     */
    public function getEmailTemplateData(int $templateId): EmailTemplateDataType
    {
        $templateData = new EmailTemplateDataType();
        $templateData->setTemplateId($templateId);
        $templateData->setSubject($this->getEmailTemplateSubjectByTemplateId($templateId));
        $templateData->setSender($this->getEmailTemplateSenderByTemplateId($templateId));
        $templateData->setMailTemplate($this->getEmailTemplateByTemplateId($templateId)->render());

        return $templateData;
    }

    /**
     * @param int $applicationId
     * @return string
     */
    public function getApplicationName(int $applicationId): string
    {
        $application = Application::where('id', $applicationId)->first();
        if ($application->lang === 'lt_LT') {
            return $application->name_lt;
        }

        if($application->lang === 'en_GB') {
            return $application->name_en;
        }

        return $application->name_en;
    }

    /**
     * @param int $applicationId
     * @return string
     */
    public function getApplicationLanguage(int $applicationId): string
    {
        $application = Application::where('id', $applicationId)->first();
        return $application->lang === 'lt_LT' ? 'lt' : 'en';
    }

    /**
     * Must also pass relations to classification and tips tables
     * @param $userInfo
     * @param string $lang
     * @return array
     */
    public function getUserApplicationLineInfoFromApplication($userInfo, $lang = 'lt'): array
    {
        $dataArr = [];
        foreach($userInfo as $info)
        {
            if(is_null($info->answerClass)) {
                if(is_null($info->answerTips)) {
                    $dataArr[$info->classification_id] = $info->answer_id;
                } else {
                    $dataArr[$info->classification_id] = $lang === 'lt' ? $info->answerTips->tnosauk : $info->answerTips->tnosauka;
                }
            } else {
                $dataArr[$info->classification_id] = $lang === 'lt' ? $info->answerClass->text_lt : $info->answerClass->text_en;
            }
        }
        return $dataArr;
    }

    /**
     * @param int $userAppId
     * @return mixed
     */
    public function getComment(int $userAppId)
    {
        return AdminTableTexts::where('user_application_id', $userAppId)->first()->answer ?? '';
    }
}
