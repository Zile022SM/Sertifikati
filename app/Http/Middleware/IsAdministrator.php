<?php

namespace App\Http\Middleware;

use Closure;

class IsAdministrator {

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next) {
        //if role !=administrator
        //do some actions
        //case 1 logout with message
        if (auth()->check()) {
            //user is logged in
            if (auth()->user()->role != \App\User::ADMINISTRATOR) {
                //user is logged in but is not administrator
                abort(401, "Unauthorized action");
            }
        } else {
            //user is not logged in
            abort(401, "Unauthorized action");
        }
        //case 2 redirect to welcome page
        //case 3 abort,set http response status 404

        return $next($request);
    }

}
