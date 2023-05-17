<?php


namespace App\Exports;


use App\Models\Esp\ForeignerDataEntry;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class ForeignerDataExport implements FromView, ShouldAutoSize
{
    public function view() : View
    {
        return view('excelExports.foreignerDataExport', [
            'headers' => $this->getTableFields(),
            'applications' => $this->transformApplicationDataToArray($this->getExportApplications())
        ]);
    }

    private function getTableFields()
    {
        return [
            'name',
            'surname',
            'citizenship',
            'birthdate',
            'email',
            'study-stage',
            'faculty',
            'study-program',
            'qualification',
            'learning-institution',
            'qualification-country',
            'qualification-study-start-date',
            'qualification-study-end-date',
            'qualification-institution-accreditation',
            'program-status',
            'program-duration',
            'program-purpose',
            'program-credit-number',
            'program-accreditation-status',
            'document-authenticity',
            'sent-to-skvc',
            'skvc-recommendation-date',
            'skvc-recommendation-number',
            'skvc-decision-status',
            'program-content-qualification',
            'program-qualification-result-status',
            'program-result-rejection-reason',
            'acceptance-final-grade',
            'acceptance-decision',
            'decision-date',
            'trd-worker',
            'skvc-recommendation-comments',
            'skvc-recommendation-file'
        ];
    }

    public function getExportApplications()
    {
        return ForeignerDataEntry::with('foreignerDataEntryInfo')->get();
    }

    public function transformApplicationDataToArray($applications)
    {
        $arr = [];
        $fields = $this->getTableFields();
        foreach ($applications as $app)
        {
            $arr[$app->id]['submitDate'] = date('Y-m-d', strtotime($app->submit_date));
            foreach ($fields as $field)
            {
                $arr[$app->id][$field] = $app->foreignerDataEntryInfo->where('data_field', $field)->first()->data_field_answer ?? '';
            }
        }
        return $arr;
    }
}
