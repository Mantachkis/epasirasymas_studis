<?php

namespace App\Http\Controllers;


use App\Models\Esp\MasterInfo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class ScholarshipController
{
    public function view(Request $request){
        $conn = DB::connection('luadm');
        $results = $conn->select("select ua.id,
                ua.submit_date,
               (select name||' '||surname from esp.users where id  = ua.user_id)||(select vards||' '||uzvards from cilveks where ckods  = (select ckods from esp.users where id  = ua.user_id)) as studentas,
               (select ual.answer_id from ekp.user_application_line ual where ual.classification_id = 'INFO0005' and ual.user_application_id  = ua.id) as tel,
               (select text_lt from ekp.application_classification ac where id = (select ual.answer_id from ekp.user_application_line ual where ual.classification_id = 'INFO0742' and ual.user_application_id  = ua.id)) as prog,
               (select ual.answer_id from ekp.user_application_line ual where ual.classification_id = 'TXT0002' and ual.user_application_id  = ua.id) as paz,
               (select ual.answer_id from ekp.user_application_line ual where ual.classification_id = 'INFO0743' and ual.user_application_id  = ua.id) as motyv,
               (select 'https://epasirasymas.vdu.lt/'||ual.answer_id from ekp.user_application_line ual where ual.classification_id = 'INFO0744' and ual.user_application_id  = ua.id) as failas
        from ekp.user_application ua 
        where application_id in (select id from ekp.application where agreement_template = 274) and user_id is not null order by 1 desc");

        //dd($results[0]->prog);

        return view('scholarshipView', [
            'results' => $results
        ]);
    }

}