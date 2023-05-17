<?php

namespace App\Console\Commands;

use App\Models\Esp\MasterInfo;
use App\Models\Esp\MasterMarks;
use App\Models\Esp\MasterSubjectCoef;
use Illuminate\Console\Command;

class ClearGrades extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'esp:ClearGrades';

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
        $masterInfo = MasterInfo::with(['masterRequestList' => function ($q){
            $q->whereNotNull('subject');
        }])->where('request_year', '2020')->where('stage', 1)->get();

        foreach($masterInfo as $master){
            $masterMark = MasterMarks::where('master_info_id', $master->id)->get();
            foreach($masterMark as $mark){
                $mark->delete();
            }

        }
    }
}
