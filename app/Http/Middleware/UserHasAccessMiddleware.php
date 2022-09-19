<?php

namespace App\Http\Middleware;

use App\Http\Controllers\Traits\MiddlewareTraits\UserHasAccessMiddlewareTrait;
use Closure;
use Illuminate\Http\Request;

class UserHasAccessMiddleware
{
    use UserHasAccessMiddlewareTrait;
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next, $permissions = null )
    {
        $permissionArray = explode("|", $permissions);

        $checkUserAbility = $this->hasUserAccess( $permissionArray );

        if( $checkUserAbility === true ) {
            return $next($request);
        }
        else {
            $data['type'] = '401';
            $data['title'] = 'Page not found';
            $data['detail'] = 'The page you looked not found!';
            return response()->view('error.error-404',$data,401);
        }
    }

    protected function getPermissionRights( $permission, $rights ){

        $rightsArray = $read = $write = $create = [];

        foreach ( $rights as $key => $right ){
            $rightsArray[$right] = ( $right === "read" || $right === "write" || $right === "create" ) ? 1 : 0;
        }
        return $rightsArray;
    }

}
