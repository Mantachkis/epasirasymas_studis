<?php

namespace App\Http\Controllers\Settings;

use App\Models\Ekp\Application;
use App\Models\Ekp\ApplicationStructure;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class AdminTableController extends Controller
{
    public function getMainView(int $appId = null)
    {
        if(!empty($appId)){
            return view('settings.adminTableBase', [
                'templates' => Application::getTemplates(),
                'templateJson' => json_decode(file_get_contents(storage_path().'/app/json/tableStruct.json'), true),
                'multiFields' => ApplicationStructure::getApplicationMultichoiceFields(Application::getNewestAppIdFromTemplate($appId)),
                'singleFields' => ApplicationStructure::getApplicationTextAnswerFields(Application::getNewestAppIdFromTemplate($appId)),
                'tableFunctions' => json_decode(file_get_contents(storage_path().'/app/json/tableFunctions.json'), true),
                'appId' => $appId,
                'blockNum' => '0'
            ]);
        } else {
            return view('settings.adminTableBase', [
                'templates' => Application::getTemplates(),
                'templateJson' => json_decode(file_get_contents(storage_path().'/app/json/tableStruct.json'), true),
                'tableFunctions' => json_decode(file_get_contents(storage_path().'/app/json/tableFunctions.json'), true),
            ]);
        }
    }


    public function getAdditionalFieldBlock(int $appId, Request $req)
    {
        return view('settings.partials.adminTableComponents', [
            'tableFunctions' => json_decode(file_get_contents(storage_path().'/app/json/tableFunctions.json'), true),
            'blockNum' => $req->get('blockNum'),
            'appId' => $appId
        ]);
    }

    public function getFunctionListView()
    {
        return view('settings.partials.adminTableFunctionList', [
            'tableFunctions' => json_decode(file_get_contents(storage_path().'/app/json/tableFunctions.json'), true)
        ]);
    }

    public function getFieldListView(int $appId, Request $req)
    {
        $multi = $req->get('multi');
        $single = $req->get('single');
        if($multi) {
            return view('settings.partials.adminTableFieldList', [
                'templateFields' => ApplicationStructure::getApplicationMultichoiceFields(Application::getNewestAppIdFromTemplate($appId)),
            ]);
        } else if ($single) {
            return view('settings.partials.adminTableFieldList', [
                'templateFields' => ApplicationStructure::getApplicationTextAnswerFields(Application::getNewestAppIdFromTemplate($appId)),
            ]);
        } else {
            return view('settings.partials.adminTableFieldList', [
                'templateFields' => ApplicationStructure::getApplicationFields(Application::getNewestAppIdFromTemplate($appId)),
            ]);
        }
    }
    public function updateAdminTable(Application $app, Request $req)
    {
        $json = json_decode(file_get_contents(storage_path().'/app/json/tableStruct.json'), true);

        $data = [];
        foreach($req->all() as $field)
        {

            if($field[0] == 'f') {
                $fieldSource = '';
                $tempArr = [
                    'source_type' => $field[0],
                    'name' => $field[sizeof($field)-1]
                ];
                for($i = 1; $i <= sizeof($field)-2; $i++)
                {
                    $fieldSource .= $field[$i].' ';
                }
                $tempArr['source'] = trim($fieldSource);
                $data[] = $tempArr;
            }
            else
            {
                $tempArr = [
                    'source_type' => $field[0],
                    'source' => $field[1],
                    'name' => $field[2]
                ];
                $data[] = $tempArr;
            }
        }
        $json[$app->id]['data'] = $data;
        Storage::put('json/tableStruct.json', json_encode($json));

        return redirect()->route('epasirasymas.settings.adminTables.getTable', ['id' => $app->id])->with('alert-success', 'Failas įkeltas');
    }
}
