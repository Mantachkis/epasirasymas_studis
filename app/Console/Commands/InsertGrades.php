<?php

namespace App\Console\Commands;

use App\Models\Esp\MasterInfo;
use App\Models\Esp\MasterMarks;
use App\Models\Esp\MasterRequestList;
use App\Models\Esp\MasterSubjectCoef;
use Illuminate\Console\Command;

class InsertGrades extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'esp:enterGrades';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $masterInfo = MasterInfo::where('request_year', '2020')->get();

        foreach($masterInfo as $master){
            $masterRequestList = MasterRequestList::select('subject')->distinct()->where('master_info_id', $master->id)->get();
            foreach($masterRequestList as $req)
            {
                $subjectCoef = MasterSubjectCoef::where('subject_code', $req->subject)->where('year', '2020')->get();
                foreach($subjectCoef as $coef) {
                    $randNum = mt_rand(0, 100) / 10;
                    $masterMark = new MasterMarks([
                        'master_info_id' => $master->id,
                        'mark' => $randNum,
                        'subject_coef_id' => $coef->id
                    ]);
                    $masterMark->save();
                    $this->line($master->name . ' ' . $master->surname . ' ' . $req->subject.' '.$coef->id. ' '.$randNum);
                }
            }
        }
    }
}
