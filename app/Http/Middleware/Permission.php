<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Helpers\Helpers;

class Permission
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next,$permissions = null)
    {
        $user = Helpers::loggedInUserObject();
        // PL Category
        if($permissions == ("Category-list")){
            if ($user->can("Category=read")) {
                return $next($request);
            }
        }
        if($permissions == ("Category-create")){
            if ($user->can("Category=create")) {
                return $next($request);
            }
        }
        if($permissions == ("Category-write")){
            if ($user->can("Category=write")) {
                return $next($request);
            }
        }
        // GL category
        if($permissions == ("GL Category-create")){
            if ($user->can("Gl Category=create")) {
                return $next($request);
            }
        }
        //sub category
        if($permissions == ("Sub Category-create")){
            if ($user->can("Sub Category=create")) {
                return $next($request);
            }
         }
        //merge category
        if($permissions == ("Merge Category-create")){
           if ($user->can("Merge Category=create")) {
            return $next($request);
            }
        }
        //brand
        if($permissions == ("Brands-list")){
            if ($user->can("Brands=read")) {
                return $next($request);
            }
        }
        if($permissions == ("Brands-create")){
            if ($user->can("Brands=create")) {
                return $next($request);
            }
        }
        if($permissions == ("Brands-write")){
            if ($user->can("Brands=write")) {
                return $next($request);
            }
        }
        //merge brand
        if($permissions == ("Merge Brand-create")){
            if ($user->can("Merge Brand=create")) {
                return $next($request);
            }
        }
        // Attributes
        if($permissions == ("Attributes-list")){
            if ($user->can("Attributes=read")) {

                return $next($request);
            }
        }
        if($permissions == ("Attributes-create")){
            if ($user->can("Attributes=create")) {
                return $next($request);
            }
        }
        if($permissions == ("Attributes-write")){
            if ($user->can("Attributes=write")) {
                return $next($request);
            }

        }
        //Weight Classes
        if($permissions == ("Weight Classes-list")){
        if ($user->can("Weight Classes=read")) {
                return $next($request);
            }
        }
        if($permissions == ("Weight Classes-create")){
            if ($user->can("Weight Classes=create")) {
                return $next($request);
            }
         }
        if($permissions == ("Weight Classes-write")){
            if ($user->can("Weight Classes=write")) {
            return $next($request);
            }
        }
        //Currency Conversions
        if($permissions == ("Currency Conversions-list")){
            if ($user->can("Currency Conversions=read")) {
                    return $next($request);
                }
            }
            if($permissions == ("Currency Conversions-create")){
                if ($user->can("Currency Conversions=create")) {
                    return $next($request);
                }
             }
            if($permissions == ("Currency Conversions-write")){
                if ($user->can("Currency Conversions=write")) {
                return $next($request);
                }
            }
            //Countries
        if($permissions == ("Countries-list")){
            if ($user->can("Countries=read")) {
                    return $next($request);
                }
            }
            if($permissions == ("Countries-create")){
                if ($user->can("Countries=create")) {
                    return $next($request);
                }
             }
            if($permissions == ("Countries-write")){
                if ($user->can("Countries=write")) {
                return $next($request);
                }
            }
            if($permissions == ("Countries Sync")){
                if ($user->can("Countries Sync=write")) {
                return $next($request);
                }
            }
             //logs
        if($permissions == ("Logs-list")){
            if ($user->can("Logs=read")) {
                    return $next($request);
                }
            }
            if($permissions == ("Logs-create")){
                if ($user->can("Logs=create")) {
                    return $next($request);
                }
             }
            if($permissions == ("Logs-write")){
                if ($user->can("Logs=write")) {
                return $next($request);
                }
            }
            if($permissions == ("job logs-read")){
                if ($user->can("job logs=read")) {
                return $next($request);
                }
            }
            //products
        if($permissions == ("Products-list")){
            if ($user->can("Products=read")) {
                    return $next($request);
                }
            }
            if($permissions == ("Products-create")){
                if ($user->can("Products=create")) {
                    return $next($request);
                }
             }
            if($permissions == ("Products-write")){
                if ($user->can("Products=write")) {
                return $next($request);
                }
            }
            if($permissions == ("Products Images-write")){
                if ($user->can("Products Images=write")) {
                return $next($request);
                }
            }
            if($permissions == ("Asin Search-list")){
                if ($user->can("Asin Search=read")) {
                return $next($request);
                }
            }
            if($permissions == ("Bulk Products Update-create")){
                if ($user->can("Bulk Products Update=create")) {
                return $next($request);
                }
            }
            if($permissions == ("Import Attributes by Category-create")){
                if ($user->can("Import Attributes by Category=create")) {
                return $next($request);
                }
            }
            if($permissions == ("Import Products-create")){
                if ($user->can("Import Products=create")) {
                return $next($request);
                }
            }
            if($permissions == ("Mark Asin As Fast Line-create")){
                if ($user->can("Mark Asin As Fast Line=create")) {
                return $next($request);
                }
            }
            if($permissions == ("Pending Validate Products-list")){
                if ($user->can("Pending Validate Products=read")) {
                return $next($request);
                }
            }
            if($permissions == ("Products Variations-write")){
                if ($user->can("Products Variations=write")) {
                return $next($request);
                }
            }
            if($permissions == ("Products Variations Images-write")){
                if ($user->can("Products Variations Images=write")) {
                return $next($request);
                }
            }
            if($permissions == ("User-list")){
            if ($user->can("User=read")) {
                    return $next($request);
                }
            }
            if($permissions == ("User-create")){
                if ($user->can("User=create")) {
                    return $next($request);
                }
             }
            if($permissions == ("User-write")){
                if ($user->can("User=write")) {
                return $next($request);
                }
            }
            //role
        if($permissions == ("Role-list")){
            if ($user->can("Role=read")) {
                    return $next($request);
                }
            }
            if($permissions == ("Role-create")){
                if ($user->can("Role=create")) {
                    return $next($request);
                }
             }
            if($permissions == ("Role-write")){
                if ($user->can("Role=write")) {
                return $next($request);
                }
            }
             //Permission
        if($permissions == ("Permission-list")){
            if ($user->can("Permission=read")) {
                    return $next($request);
                }
            }
            if($permissions == ("Permission-create")){
                if ($user->can("Permission=create")) {
                    return $next($request);
                }
             }
            if($permissions == ("Permission-write")){
                if ($user->can("Permission=write")) {
                return $next($request);
                }
            }
            $data['type'] = '401';
            $data['title'] = 'Page not found';
            $data['detail'] = 'The page you looked not found!';
            return response()->view('error.error-404',$data,401);
        }

}
