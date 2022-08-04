<?php

namespace App\Policies;

use App\Http\Controllers\TraitClasses\SessionTrait;
use App\Http\Controllers\Traits\MiddlewareTraits\UserHasAccessMiddlewareTrait;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserCanPermissionPolicy
{
    use HandlesAuthorization;
    use SessionTrait;
    use UserHasAccessMiddlewareTrait;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function userCanPermission( $ability = null ){

        $getPermissionRights = $getPermissionRightsArray = "";
        $getPermissionRightsArray = [];

        if( strpos($ability, '=') !== false ){

            $getAbilities = explode("=", $ability);
            $getPermissionName = $getAbilities[0];
            $getPermissionRights = $getAbilities[1];

            if( !empty($getPermissionRights) && strpos($getPermissionRights, '|') !== false ){
                $getPermissionRightsArray = explode("|", $getPermissionRights);
            } else {
                array_push( $getPermissionRightsArray, $getPermissionRights);
            }

            try {

                $checkUserAbility = $this->userCanPermissionRightsAccess($getPermissionName, $getPermissionRightsArray);

                return $checkUserAbility;

            } catch (\Exception $e){

                self::customSessionMessage(1, "Error", " INVALID PERMISSION RIGHTS");
                return false;
            }

        } else {
            try {
                $getPermissionName = $ability;
                $checkUserAbility = $this->userCanPermissionAccess( $getPermissionName );
                return $checkUserAbility;

            } catch (\Exception $e){
                self::customSessionMessage(1, "Error", " INVALID PERMISSION");
                return false;
            }
        }

        self::customSessionMessage(1, "Error", " INVALID PERMISSION");
        return false;

    }
}
