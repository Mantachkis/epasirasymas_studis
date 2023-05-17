<?php

namespace App\Providers;

use App\Models\Esp\MasterStageAdmin;
use App\Models\PermissionModel;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Blade::if('role', function ($roleName) {
            return PermissionModel::checkIfHasPermission($roleName);
        });

        Blade::if('adminRights',function($stage, $year, $permName){
           return !empty(MasterStageAdmin::where('stage', $stage)->where('year', $year)->where($permName, 'Y')->first());
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
