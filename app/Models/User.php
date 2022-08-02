<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Http\Controllers\Traits\GeneralTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use Notifiable;
    use  HasRoles;
    use GeneralTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'fc_users';
    protected $fillable = [
        'first_name',
        'last_name',
        'user_email',
        'password',
        'user_level',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];
    public static function createUser( $request ) {


        $reads = $request->post("read");
        $writes = $request->post("write");
        $creates = $request->post("create");

        $user = new User();
        if( $request->has("first_name") ) {
            $user->first_name = $request->post("first_name");
        }
        if( $request->has("last_name") ) {
            $user->last_name = $request->post("last_name");
        }

        if( $request->has("user_email") ) {
            $user->email = $request->post("user_email");
        }
        if( $request->has("password") ) {
            $user->password = Hash::make($request->post("password"));
        }
        $user->username = $request->post("user_email");
        $user->username_url = $request->post("user_email");
        $user->user_status ='enable';

        $user->user_level = config('app.user_level');
        $user->save();

        $comparisonResult = false;
        $getToSavePermissionRights = [];

        if( !empty($request->user_role) && $request->user_role[0] !== "only_permissions" && count($request->user_role) == 1 ) {
            $userRoleId = (integer) $request->user_role[0];
            $roleFind = Role::where("id", $userRoleId)->with(["permissions" => function ($query) {
                $query->select('name', 'read', 'create', 'write');
            }])->first();
            $userPermissions = [
                "read" => $reads,
                "write" => $writes,
                "create" => $creates,
            ];
            $comparisonResult = self::comparePermissions($roleFind, $userPermissions);
        } // single role setting

        if ( $comparisonResult !== true ){
            $getToSavePermissions = [];

            if( !empty($request->post("read")) ) {
                foreach ($reads as $key => $read) {

                    $permissionRead = Permission::where("name", $read)->select("id","name")->first();
                    if( !in_array($permissionRead->name, $getToSavePermissions) ){
                        array_push($getToSavePermissions, $permissionRead->name);
                    }
                    array_push($getToSavePermissionRights, $permissionRead->name."_read_".$permissionRead->id);

                }
            }

            if( !empty($request->post("write")) ) {

                foreach ($writes as $key => $write) {

                    $permissionWrite = Permission::where("name", $write)->select("id","name")->first();
                    if( !in_array($permissionWrite->name, $getToSavePermissions) ){
                        array_push($getToSavePermissions, $permissionWrite->name);
                    }
                    array_push($getToSavePermissionRights, $permissionWrite->name."_write_".$permissionWrite->id);

                }
            }

            if( !empty($request->post("create")) ) {

                foreach ($creates as $key => $create) {

                    $permissionCreate = Permission::where("name", $create)->select("id","name")->first();
                    if( !in_array($permissionCreate->name, $getToSavePermissions) ){
                        array_push($getToSavePermissions, $permissionCreate->name);
                    }
                    array_push($getToSavePermissionRights, $permissionCreate->name."_create_".$permissionCreate->id);
                }

            }

            $user->givePermissionTo($getToSavePermissions);

            foreach ( $getToSavePermissionRights as $key => $getToSavePermissionRight ){

                $explodedAction = explode("_", $getToSavePermissionRight);
                $permission = $explodedAction[0];
                $right = $explodedAction[1];
                $permissionId = $explodedAction[2];

                if( $right === "read" ){
                    DB::table(config('permission.table_names.model_has_permissions'))
                        ->where('permission_id', $permissionId)
                        ->where('model_id', $user->id)
                        ->update(['read' => 1]);
                }

                if( $right === "write" ){
                    DB::table(config('permission.table_names.model_has_permissions'))
                        ->where('permission_id', $permissionId)
                        ->where('model_id', $user->id)
                        ->update(['write' => 1]);
                }

                if( $right === "create" ){
                    DB::table(config('permission.table_names.model_has_permissions'))
                        ->where('permission_id', $permissionId)
                        ->where('model_id', $user->id)
                        ->update(['create' => 1]);
                }
            }


        }
        else {

            $user->assignRole($roleFind->name);
        }

        app()['cache']->forget('spatie.permission.cache');
        return $user;
    }
    protected static function getUserIDANDName(){

        $query = DB::table("fc_users")->whereIn('user_level',['catalog-user','god'])->select("id as userId","first_name as userName");
        $getUsers = $query->get();
        return $getUsers;
    }
    public static function updatePassword( $request, $id ) {

        $user = User::find($id);
        $user->password = Hash::make($request->post("password"));
        if( $user->save() ) {
            return true;
        }

        return false;
    }
    public static function updateUser( $request, $id ) {


        $reads = $request->post("read");
        $writes = $request->post("write");
        $creates = $request->post("create");

        $user = User::find($id);
        $oldPass = $user->password;

        if( $request->has("first_name") ) {
            $user->first_name = $request->post("first_name");
        }
        if( $request->has("last_name") ) {
            $user->last_name = $request->post("last_name");
        }
        if( $request->has("email") ) {
            $user->email = $request->post("email");
        }

        $user->save();

        $comparisonResult = false;
        $getToSavePermissionRights = [];

        if( !empty($request->user_role) && $request->user_role[0] !== "only_permissions" && count($request->user_role) == 1 ) {

            $userRoleId = (integer) $request->user_role[0];

            $roleFind = Role::where("id", $userRoleId)
                ->with(["permissions" => function ($query) {
                    $query->select('name', 'read', 'create', 'write')
                        ->orderBy("name", "ASC");
                }])
                ->first();
            $userPermissions = [
                "read" => $reads,
                "write" => $writes,
                "create" => $creates,
            ];

            if ($userRoleId !== "only_permissions") {
                $comparisonResult = self::comparePermissions($roleFind, $userPermissions);
            } else {
                $comparisonResult = false;
            }

        }

        if ( $comparisonResult !== true ){

            $getToSavePermissions = [];

            if( !empty($request->post("read")) ) {
                foreach ($reads as $key => $read) {
                    $permissionRead = Permission::where("name", $read)->select("id","name")->first();
                    if( !in_array($permissionRead->name, $getToSavePermissions) ){
                        array_push($getToSavePermissions, $permissionRead->name);
                    }
                    array_push($getToSavePermissionRights, $permissionRead->name."_read_".$permissionRead->id);
                }
            }

            if( !empty($request->post("write")) ) {

                foreach ($writes as $key => $write) {

                    $permissionWrite = Permission::where("name", $write)->select("id","name")->first();
                    if( !in_array($permissionWrite->name, $getToSavePermissions) ){
                        array_push($getToSavePermissions, $permissionWrite->name);
                    }
                    array_push($getToSavePermissionRights, $permissionWrite->name."_write_".$permissionWrite->id);
                }
            }

            if( !empty($request->post("create")) ) {
                foreach ($creates as $key => $create) {

                    $permissionCreate = Permission::where("name", $create)->select("id","name")->first();
                    if( !in_array($permissionCreate->name, $getToSavePermissions) ){
                        array_push($getToSavePermissions, $permissionCreate->name);
                    }
                    array_push($getToSavePermissionRights, $permissionCreate->name."_create_".$permissionCreate->id);

                }
            }

            $user->roles()->detach();
            $user->syncPermissions($getToSavePermissions);

            foreach ( $getToSavePermissionRights as $key => $getToSavePermissionRight ){
                $explodedAction = explode("_", $getToSavePermissionRight);
                $permission = $explodedAction[0];
                $right = $explodedAction[1];
                $permissionId = $explodedAction[2];

                if( $right === "read" ){
                    DB::table(config('permission.table_names.model_has_permissions'))
                        ->where('permission_id', $permissionId)
                        ->where('model_id', $user->id)
                        ->update(['read' => 1]);
                }

                if( $right === "write" ){
                    DB::table(config('permission.table_names.model_has_permissions'))
                        ->where('permission_id', $permissionId)
                        ->where('model_id', $user->id)
                        ->update(['write' => 1]);
                }

                if( $right === "create" ){
                    DB::table(config('permission.table_names.model_has_permissions'))
                        ->where('permission_id', $permissionId)
                        ->where('model_id', $user->id)
                        ->update(['create' => 1]);
                }
            }


        }
        else {
            $user->permissions()->detach();
            $user->syncRoles($roleFind->name);
        }
        return $user;
    }
    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

}
