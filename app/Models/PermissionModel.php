<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PermissionModel extends Model
{
    /**
     * @param $permissionName
     * @return bool
     */
    public static function checkIfHasPermission($permissionName)
    {
        if (!auth()->check()) {
            return false;
        }

        $currentUserName = auth()->user()->username;

        $userRights = "https://sso.vdu.lt/api/user/".$currentUserName."/permissions";

        $json = json_decode(file_get_contents($userRights), true);

        if (!isset($json['data']['epasirasymas'])) {
            return false;
        }

        if (!in_array($permissionName, $json['data']['epasirasymas'])) {
            return false;
        }

        return true;
    }
}
