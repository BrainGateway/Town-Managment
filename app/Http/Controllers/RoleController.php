<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\RoleRequest;
use App\Http\Controllers\TraitClasses\SessionTrait;
use App\Http\Controllers\Traits\GeneralTrait;
use Spatie\Permission\Models\Permission;
use App\Helpers\Helpers;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use RealRashid\SweetAlert\Facades\Alert;
class RoleController extends Controller
{
    public function __construct()
    {
        $this->middleware('user_has_permission:Role-list')->only('index','show');
        $this->middleware('user_has_permission:Role-create')->only('create');
        $this->middleware('user_has_permission:Role-write')->only('edit');
     }
    use GeneralTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rolesWithPermissions = Role::with('permissions')
        ->with("users")
        ->get();

    return view('user-management.role.index', compact("rolesWithPermissions"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $permissions = Permission::get();

        return view('user-management.role.create', compact("permissions"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RoleRequest $request)
    {
        $validated = $request->validated();

        if($validated) {

            try {

                $reads = $request->post("read");
                $writes = $request->post("write");
                $creates = $request->post("create");

                $role = [
                    'name' => $request->name,
                ];

                /** @var $storeData */
                $role = Role::create($role);

                $getToSavePermissionRights = [];
                $getToSavePermissions = [];

                if( !empty($request->post("read")) ){
                    foreach ( $reads as $key => $read ) {

                        $permissionRead = Permission::findByName($read);
                        if( !in_array($permissionRead->name, $getToSavePermissions) ){
                            array_push($getToSavePermissions, $permissionRead->name);
                        }
                        array_push($getToSavePermissionRights, $permissionRead->name."_read_".$permissionRead->id);

                    }
                }

                if( !empty($request->post("write")) ) {
                    foreach ($writes as $key => $write) {

                        $permissionWrite = Permission::findByName($write);
                        if( !in_array($permissionWrite->name, $getToSavePermissions) ){
                            array_push($getToSavePermissions, $permissionWrite->name);
                        }
                        array_push($getToSavePermissionRights, $permissionWrite->name."_write_".$permissionWrite->id);

                    }
                }

                if( !empty($request->post("create")) ) {
                    foreach ($creates as $key => $create) {

                        $permissionCreate = Permission::findByName($create);
                        if( !in_array($permissionCreate->name, $getToSavePermissions) ){
                            array_push($getToSavePermissions, $permissionCreate->name);
                        }
                        array_push($getToSavePermissionRights, $permissionCreate->name."_create_".$permissionCreate->id);
                    }
                }

                $role->givePermissionTo($getToSavePermissions);

                foreach ( $getToSavePermissionRights as $key => $getToSavePermissionRight ){
                    $explodedAction = explode("_", $getToSavePermissionRight);
                    $permission = $explodedAction[0];
                    $right = $explodedAction[1];
                    $permissionId = $explodedAction[2];

                    if( $right === "read" ){
                        DB::table(config('permission.table_names.role_has_permissions'))
                            ->where('permission_id', $permissionId)
                            ->where('role_id', $role->id)
                            ->update(['read' => 1]);
                    }

                    if( $right === "write" ){
                        DB::table(config('permission.table_names.role_has_permissions'))
                            ->where('permission_id', $permissionId)
                            ->where('role_id', $role->id)
                            ->update(['write' => 1]);
                    }

                    if( $right === "create" ){
                        DB::table(config('permission.table_names.role_has_permissions'))
                            ->where('permission_id', $permissionId)
                            ->where('role_id', $role->id)
                            ->update(['create' => 1]);
                    }
                }

                if( $role ) {
                    Alert::success('Role', 'Successfully created');
                    return redirect()->route('roles.index');
                }

            }
            catch (\Exception $e){
                $msgArray = [
                    "code"  => 1,
                    "status"    => "error",
                    "message"   => $e,
                ];
                return $msgArray;
            }

        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $getUserRole = Helpers::loggedInUserRole();
        $role = Role::where("id", $id)->with("permissions")->first();
        $query = DB::table("town_users")->where("role_id", $id)
            ->join(config('permission.table_names.model_has_roles'), config('permission.table_names.model_has_roles').".model_id", "town_users.id")
            ->select("town_users.id", "town_users.email", "town_users.first_name", "town_users.created_at");

        $getUsers = $query
            ->orderBy("town_users.id", "desc")
            ->get();

        return view('user-management.role.show', compact("role", "getUsers"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $permissions = Permission::get();
        $role = Role::where("id", $id)->with(["permissions" => function($query){
            $query->select('name', 'read', 'create', 'write');}])->first();

        $selectedPermissions = self::roleWiseSelectedPermissions( $role->permissions );

        return view('user-management.role.edit', compact("role", "permissions", "selectedPermissions"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(RoleRequest $request, $id)
    {
        $validated = $request->validated();

        if($validated) {


                $reads = $request->post("read");
                $writes = $request->post("write");
                $creates = $request->post("create");


                /** @var $role */
                $role = Role::find($id);
                if( $request->has("name") ){
                    $role->name = $request->name;
                }
                $role->save();


                $getToSavePermissionRights = [];
                $getToSavePermissions = [];

                if( !empty($request->post("read")) ) {
                    foreach ($reads as $key => $read) {

                        $permissionRead = Permission::findByName($read);
                        if( !in_array($permissionRead->name, $getToSavePermissions) ){
                            array_push($getToSavePermissions, $permissionRead->name);
                        }
                        array_push($getToSavePermissionRights, $permissionRead->name."_read_".$permissionRead->id);
                    }
                }

                if( !empty($request->post("write")) ) {
                    foreach ($writes as $key => $write) {

                        $permissionWrite = Permission::findByName($write);
                        if( !in_array($permissionWrite->name, $getToSavePermissions) ){
                            array_push($getToSavePermissions, $permissionWrite->name);
                        }
                        array_push($getToSavePermissionRights, $permissionWrite->name."_write_".$permissionWrite->id);
                    }
                }

                if( !empty($request->post("create")) ) {
                    foreach ($creates as $key => $create) {

                        $permissionCreate = Permission::findByName($create);
                        if( !in_array($permissionCreate->name, $getToSavePermissions) ){
                            array_push($getToSavePermissions, $permissionCreate->name);
                        }
                        array_push($getToSavePermissionRights, $permissionCreate->name."_create_".$permissionCreate->id);
                    }
                }

                $role->syncPermissions($getToSavePermissions);

                foreach ( $getToSavePermissionRights as $key => $getToSavePermissionRight ){
                    $explodedAction = explode("_", $getToSavePermissionRight);
                    $permission = $explodedAction[0];
                    $right = $explodedAction[1];
                    $permissionId = $explodedAction[2];

                    if( $right === "read" ){
                        DB::table(config('permission.table_names.role_has_permissions'))
                            ->where('permission_id', $permissionId)
                            ->where('role_id', $role->id)
                            ->update(['read' => 1]);
                    }

                    if( $right === "write" ){
                        DB::table(config('permission.table_names.role_has_permissions'))
                            ->where('permission_id', $permissionId)
                            ->where('role_id', $role->id)
                            ->update(['write' => 1]);
                    }

                    if( $right === "create" ){
                        DB::table(config('permission.table_names.role_has_permissions'))
                            ->where('permission_id', $permissionId)
                            ->where('role_id', $role->id)
                            ->update(['create' => 1]);
                    }
                }

                if( $role ) {
                    Alert::success('Role', 'Successfully updated');
                    return redirect()->route('roles.index');
                }


        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        try {
            $deleteData = Role::where('id',$id)->delete();
            if( $deleteData == true ) {
                $msgArray = [
                    "code"  => 0,
                    "status"    => "success",
                    "message"   => "Successfully deleted!..",
                ];
            } else {
                $msgArray = [
                    "code"  => 1,
                    "status"    => "error",
                    "message"   => "This Role can not be deleted because of this is used in.",
                ];
            }
            return $msgArray;
        }
        catch (\Exception $e){
            $msgArray = [
                "code"  => 1,
                "status"    => "error",
                "message"   => $e,
            ];
            return $msgArray;
        }

    }
}
