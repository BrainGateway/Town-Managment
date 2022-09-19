<?php


namespace App\Http\Controllers\Traits;


trait GeneralTrait
{

    public static function comparePermissions( $rolePermissions, $userPermissions ){

        $read = $write = $create = [];

        if( !empty($rolePermissions) ) {
            $rolePermissions = $rolePermissions->permissions;

            foreach ($rolePermissions as $key => $perm) {
                if ($perm->create == 1) {
                    array_push($create, $perm->name);
                }
                if ($perm->read == 1) {
                    array_push($read, $perm->name);
                }
                if ($perm->write == 1) {
                    array_push($write, $perm->name);
                }
            }

            $rolePermissions = [
                "read" => $read,
                "write" => $write,
                "create" => $create,
            ];

            if ($userPermissions == $rolePermissions) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    protected function comparePermissionsForMiddleware( $rolePermissions, $userPermissions ){

        $read = $write = $create = [];

        foreach ($rolePermissions as $key => $perm ){
            if($perm->pivot->create == 1){
                array_push($create,$perm->name);
            }
            if($perm->pivot->read == 1){
                array_push($read,$perm->name);
            }
            if($perm->pivot->write == 1){
                array_push($write,$perm->name);
            }
        }

        $rolePermissions = [
            "read" => $read,
            "write" => $write,
            "create" => $create,
        ];

        dd( $rolePermissions, $userPermissions);

        if($userPermissions == $rolePermissions){
            return true;
        }else{
            return false;
        }
    }

    protected static function roleWiseSelectedPermissions( $permissions ){

        $selectedPermissions = [];
        foreach ( $permissions as $permission ){

            if( $permission->read == 1){
                array_push($selectedPermissions, $permission->name."_read");
            }
            if( $permission->write == 1){
                array_push($selectedPermissions, $permission->name."_write");
            }
            if( $permission->create == 1){
                array_push($selectedPermissions, $permission->name."_create");
            }
        }

        return $selectedPermissions;

    }

    protected static function modelWiseSelectedPermissions( $permissions ){

        $selectedPermissions = [];
        foreach ( $permissions as $permission ){

            if( $permission->read == 1){
                array_push($selectedPermissions, $permission->name."_read");
            }
            if( $permission->write == 1){
                array_push($selectedPermissions, $permission->name."_write");
            }
            if( $permission->create == 1){
                array_push($selectedPermissions, $permission->name."_create");
            }
        }

        return $selectedPermissions;

    }

}
