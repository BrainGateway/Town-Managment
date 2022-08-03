<?php


namespace App\Http\Controllers\Traits\MiddlewareTraits;


use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

trait UserHasAccessMiddlewareTrait
{

    protected function hasUserAccess( $permissions = null ){

        $query = User::where("id", auth()->user()->id);
        $user = $query->first();
        $userInfo = $query->with(["permissions" => function($query){
            $query->select('name', 'read', 'create', 'write');}])->with("roles")->first();
        $getUserRole = $user->roles->pluck('name');

        if( $user->hasAnyDirectPermission($permissions) ){
            $getUserDirectPermissions = $userInfo->permissions;
            $getUserRoleOnlyPermissions = $getUserDirectPermissions->pluck("name")->toArray();

            if( !$getUserDirectPermissions->isEmpty() ){

                if( $this->in_array_any( $permissions, $getUserRoleOnlyPermissions ) === true ) {
                    return true;
                }
                else {
                    return false;
                }

            }
        }
        /*else if ( $user->hasExactRoles($roles) ){*/
        /*else if ( $user->hasAnyRole($roles) ){*/
        else if ( !empty($getUserRole) ){
            /*$getUserRole = $user->roles->pluck("name");*/
            $getUserRolePermissions = $user->getPermissionsViaRoles();
            $getUserRoleOnlyPermissions = $user->getPermissionsViaRoles()->pluck("name")->toArray();

            if( !$getUserRolePermissions->isEmpty() ){

                if( $this->in_array_any( $permissions, $getUserRoleOnlyPermissions ) == true ) {
                    return true;
                }
                else {
                    return false;
                }

            }
        }


        return false;
    }

    protected function userHasSingleRoleAccess( $roles = null ){

        $query = User::where("id", auth()->user()->id);
        $user = $query->first();
        $userInfo = $query->with("roles")->first();
        /*else if ( $user->hasExactRoles($roles) ){*/
        if ( $user->hasRole( $roles ) ){
            return true;
        } else {
            return false;
        }


        return false;
    }

    protected function userCanPermissionRightsAccess( $permissionName = null, $rights = null ){

        $query = User::where("id", auth()->user()->id);
        $user = $query->first();
        $userInfo = $query->with(["permissions" => function($query){
            $query->select('name', 'read', 'create', 'write');}])->with("roles")->first();


        if( $user->hasDirectPermission($permissionName) ){
            $getUserDirectPermission = $userInfo->permissions->where("name", $permissionName)->first();

            $getuserDirectPermissionRightsArray = [];
            if( $getUserDirectPermission->read === 1 ){
                array_push( $getuserDirectPermissionRightsArray, "read");
            }
            if( $getUserDirectPermission->write === 1 ){
                array_push( $getuserDirectPermissionRightsArray, "write");
            }
            if( $getUserDirectPermission->create === 1 ){
                array_push( $getuserDirectPermissionRightsArray, "create");
            }

            if( $getUserDirectPermission && $getuserDirectPermissionRightsArray ){

                if( $this->in_array_all( $rights, $getuserDirectPermissionRightsArray ) === true ) {
                    return true;
                } else {
                    return false;
                }

            } else {
                return false;
            }
        }
        else if ( !$userInfo->roles->isEmpty() && count($userInfo->roles) === 1 ){
            $getUserRolePermission = $user->getPermissionsViaRoles()->where("name", $permissionName)->first();
            //->withPivot("create", "read", "write")
            if( $getUserRolePermission ) {
                $getUserRolePermissionRights = $getUserRolePermission->pivot;
                //dump($getUserRolePermissionRights);
                $setUserPermissionRightsArray = [];
                if ($getUserRolePermissionRights->read === 1) {
                    array_push($setUserPermissionRightsArray, "read");
                }
                if ($getUserRolePermissionRights->write === 1) {
                    array_push($setUserPermissionRightsArray, "write");
                }
                if ($getUserRolePermissionRights->create === 1) {
                    array_push($setUserPermissionRightsArray, "create");
                }
               // dump($getUserRolePermissionRights);
               // dump($permissionName);

                if ($getUserRolePermission && $setUserPermissionRightsArray) {

                    if ($this->in_array_all($rights, $setUserPermissionRightsArray) === true) {
                        return true;
                    } else {
                        return false;
                    }

                } else {
                    return false;
                }

            } else {
                return false;
            }

        }


        return false;
    }

    protected function userCanPermissionAccess( $permissionName = null ){

        $query = User::where("id", auth()->user()->id);
        $user = $query->first();
        $userInfo = $query->with("permissions")->with("roles")->first();


        if( $user->hasDirectPermission($permissionName) ){

            $getUserDirectPermission = $userInfo->permissions->where("name", $permissionName)->first();

            if( $getUserDirectPermission && $getUserDirectPermission->name === $permissionName ){
                return true;
            } else {
                return false;
            }
        }
        else if ( !$userInfo->roles->isEmpty() && count($userInfo->roles) === 1 ){

            $getUserRolePermission = $user->getPermissionsViaRoles()->where("name", $permissionName)->first();

            if( $getUserRolePermission ) {

                if( $getUserRolePermission && $getUserRolePermission->name === $permissionName ){
                    return true;
                } else {
                    return false;
                }

            } else {
                return false;
            }
        }


        return false;
    }

    protected function in_array_any($needles, $haystack) {
        return !empty(array_intersect($needles, $haystack));
    }

    protected function in_array_all($needles, $haystack) {
        return empty(array_diff($needles, $haystack));
    }




}
