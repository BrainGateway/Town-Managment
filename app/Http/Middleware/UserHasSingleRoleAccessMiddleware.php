<?php

namespace App\Http\Middleware;

use App\Http\Controllers\Traits\MiddlewareTraits\UserHasAccessMiddlewareTrait;
use Closure;
use Illuminate\Http\Request;

class UserHasSingleRoleAccessMiddleware
{
    use UserHasAccessMiddlewareTrait;

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next, $role = null )
    {
        $getRoles = explode("|", $role);

        $checkUserAbility = $this->userHasSingleRoleAccess( $getRoles );

        if( $checkUserAbility === true ) {
            return $next($request);
        }
        else {
            $data['type'] = '401';
            $data['title'] = 'Page not found';
            $data['detail'] = 'The page you looked not found!';
            return response()->view('pages.error.error-404',$data,404);
        }
    }
}
