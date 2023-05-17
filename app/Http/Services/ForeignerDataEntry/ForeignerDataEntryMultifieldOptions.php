<?php


namespace App\Http\Services\ForeignerDataEntry;


class ForeignerDataEntryMultifieldOptions
{
    private $studyStages = [
        'BA',
        'MA',
        'PhD'
    ];

    private $accreditationStatuses = [
        'Akredituota',
        'Neakredituota'
    ];

    private $programActivityStatuses = [
        'Šiuo metu veikia',
        'Šiuo metu neveikia'
    ];

    private $programPurposeList = [
        'Bendrasis išsilavinimas',
        'Profesinis išsilavinimas',
        'Su specializacija',
        'Kita'
    ];

    private $programAccreditationStatuses = [
        'Akredituota programa',
        'Neakredituota programa'
    ];

    private $yesNoStatuses = [
        'Taip',
        'Ne'
    ];

    private $yesNoOtherStatuses = [
        'Taip',
        'Ne',
        'Kita'
    ];

    private $skvcDecisionStatuses = [
        'Kvalifikacija atitinka nustatytus reikalavimus. Dokumentai perduodami kokybiniam vertinimui.',
        'Kvalifikacija neatitinka nustatytų reikalavimų. Kokybinis vertinimas nevykdomas.'
    ];

    private $qualificationStatuses = [
        'Atitinka',
        'Neatitinka'
    ];

    private $acceptanceDecisionList = [
       'Asmuo priimamas be papildomų sąlygų',
       'Asmuo priimamas su papildomomis sąlygomis',
       'Asmeniui rekomenduojama pasirinkti kitą studijų programą, atitinkančią baigtų studijų kryptį',
       'Asmuo priimamas į tos pačios pakopos aukštesnį kursą, užskaitant užsienio institucijoje išklausytus dalykus',
       'Asmeniui sudaromas papildomų studijų dalykų planas, kai jo kompetencijos įgytos I pakopos studijų metu
        nepakankamos priėmimui į II pakopos studijas.
        Tik išklausęs šiuos dalykus stojantysis gali būti priimamas į II pakopos studijas',
       'Asmeniui rekomenduojama pirmo semestro metu pasirinkti daugiau studijų dalykų,
        kurių žinių jam trūksta ir/ar vidurinio išsilavinimo metu įgytos žinios
        yra nepakankamos studijuoti universitete I pakopos studijose',
       'Asmuo nepriimamas, nes turima kvalifikacija ir/ar studijų rezultatai neatitinka nustatytų reikalavimų
        priėmimui į universitetines studijas'
    ];

    /**
     * @return string[]
     */
    public function getQualificationStatuses(): array
    {
        return $this->qualificationStatuses;
    }

    /**
     * @param string[] $qualificationStatuses
     */
    public function setQualificationStatuses(array $qualificationStatuses): void
    {
        $this->qualificationStatuses = $qualificationStatuses;
    }

    /**
     * @return string[]
     */
    public function getSkvcDecisionStatuses(): array
    {
        return $this->skvcDecisionStatuses;
    }

    /**
     * @param string[] $skvcDecisionStatuses
     */
    public function setSkvcDecisionStatuses(array $skvcDecisionStatuses): void
    {
        $this->skvcDecisionStatuses = $skvcDecisionStatuses;
    }

    /**
     * @return string[]
     */
    public function getYesNoStatuses(): array
    {
        return $this->yesNoStatuses;
    }

    /**
     * @param string[] $yesNoStatuses
     */
    public function setYesNoStatuses(array $yesNoStatuses): void
    {
        $this->yesNoStatuses = $yesNoStatuses;
    }

    /**
     * @return string[]
     */
    public function getYesNoOtherStatuses(): array
    {
        return $this->yesNoOtherStatuses;
    }

    /**
     * @param string[] $yesNoOtherStatuses
     */
    public function setYesNoOtherStatuses(array $yesNoOtherStatuses): void
    {
        $this->yesNoOtherStatuses = $yesNoOtherStatuses;
    }

    /**
     * @return string[]
     */
    public function getProgramActivityStatuses(): array
    {
        return $this->programActivityStatuses;
    }

    /**
     * @param string[] $programActivityStatuses
     */
    public function setProgramActivityStatuses(array $programActivityStatuses): void
    {
        $this->programActivityStatuses = $programActivityStatuses;
    }

    /**
     * @return string[]
     */
    public function getProgramPurposeList(): array
    {
        return $this->programPurposeList;
    }

    /**
     * @param string[] $programPurposeList
     */
    public function setProgramPurposeList(array $programPurposeList): void
    {
        $this->programPurposeList = $programPurposeList;
    }

    /**
     * @return string[]
     */
    public function getProgramAccreditationStatuses(): array
    {
        return $this->programAccreditationStatuses;
    }

    /**
     * @param string[] $programAccreditationStatuses
     */
    public function setProgramAccreditationStatuses(array $programAccreditationStatuses): void
    {
        $this->programAccreditationStatuses = $programAccreditationStatuses;
    }

    /**
     * @return string[]
     */
    public function getAccreditationStatuses(): array
    {
        return $this->accreditationStatuses;
    }

    /**
     * @param string[] $accreditationStatuses
     */
    public function setAccreditationStatuses(array $accreditationStatuses): void
    {
        $this->accreditationStatuses = $accreditationStatuses;
    }
    /**
     * @return string[]
     */
    public function getStudyStages(): array
    {
        return $this->studyStages;
    }

    /**
     * @param string[] $studyStages
     */
    public function setStudyStages(array $studyStages): void
    {
        $this->studyStages = $studyStages;
    }

    /**
     * @return string[]
     */
    public function getAcceptanceDecisionList(): array
    {
        return $this->acceptanceDecisionList;
    }

    /**
     * @param string[] $acceptanceDecisionList
     */
    public function setAcceptanceDecisionList(array $acceptanceDecisionList): void
    {
        $this->acceptanceDecisionList = $acceptanceDecisionList;
    }
}
