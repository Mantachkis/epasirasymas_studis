<?php

namespace App\Models\Ekp;

use Yajra\Oci8\Eloquent\OracleEloquent as Eloquent;

class Application extends Eloquent
{
    protected $connection = 'ekp';

    protected $table = 'application';

    protected $primaryKey = 'id';

    public $sequence = null;

    public $timestamps = null;

    public function template()
    {
        return $this->hasOne('App\Models\Ekp\Application', 'id', 'agreement_template');
    }

    public static function getTemplateId(int $applicationId)
    {
        return Application::where('id', $applicationId)->first()->templateId;
    }

    public static function getNewestAppIdFromTemplate(int $templateId)
    {
        return Application::where('agreement_template', $templateId)->max('id');
    }

    public static function getTemplates()
    {
        return Application::with('template')->select('agreement_template')->orderBy('agreement_template')->distinct()->get();
    }

    public static function getApplicationName(int $applicationId): string
    {
        $application = Application::where('id', $applicationId)->first();
        if ($application->lang === 'lt_LT') {
            return $application->name_lt;
        }

        if($application->lang === 'en_GB') {
            return $application->name_en;
        }

        return $application->name_lt;
    }
}
