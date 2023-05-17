<?php

namespace App\Http\Middleware;

use Closure;

class Scholarchip
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $currentUserName = auth()->user()->username;
        $userRights = "https://sso.vdu.lt/api/user/".$currentUserName."/permissions";

        $json = json_decode(file_get_contents($userRights), true);

        if (!isset($json['data']['epasirasymas'])) {
            abort(403);
        }
        if (!in_array('epasirasymas_stip', $json['data']['epasirasymas'])) {
            abort(403);
        }

        return $next($request);
    }
}
