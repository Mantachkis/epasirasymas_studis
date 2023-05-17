<?php


namespace App\Http\Services\ForeignerDataEntry;


use App\Models\Esp\ForeignerDataEntry;
use App\Models\Luadm\Programma;

class ForeignerDataRetrievalService
{
    public function getTableFieldData(int $id = null)
    {
        if(is_null($id)) {
            $data = ForeignerDataEntry::with(['foreignerDataEntryInfo' => function($q) {
                $q->whereIn('data_field', ['name', 'surname', 'birthdate', 'citizenship', 'study-stage', 'faculty', 'study-program', 'sent-to-skvc', 'trd-worker']);
            }])->get();
        } else {
            $data = ForeignerDataEntry::with('foreignerDataEntryInfo')->where('id', $id)->get();
        }


        $returnData = [];

        foreach($data as $d)
        {
            $returnData[$d->id]['id'] = $d->id;
            $returnData[$d->id]['ckods'] = $d->ckods;
            $returnData[$d->id]['submitDate'] = date('Y-m-d', strtotime($d->submit_date));
            foreach($d->foreignerDataEntryInfo as $dataField)
            {
                $returnData[$d->id][$dataField->data_field] = $dataField->data_field_answer;
            }
        }
        return $returnData;
    }

    public function getProgramList(string $stkods)
    {
        return Programma::with([
            'tipsNodala' => function ($q) {
                $q->select(['tkods', 'tnosauk']);
            }
        ])->with([
            'tipsLimenis' => function ($q) {
                $q->select(['tkods', 'tnosauk']);
            }
        ])->where('strukturv_stkods', $stkods)
            ->whereIn('tips_limenis', ['B90300', 'B90400'])
            ->where('status', 'A')
            ->orderBy('pnosauk')->get();
    }
}
