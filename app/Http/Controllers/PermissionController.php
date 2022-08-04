<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\PermissionRequest;
use App\Http\Controllers\TraitClasses\SessionTrait;
use App\Http\Controllers\Traits\GeneralTrait;
use Carbon\Carbon;
use App\Helpers\Helpers;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;
use App\Models\Permission;
use Spatie\Permission\Models\Role;
use RealRashid\SweetAlert\Facades\Alert;

class PermissionController extends Controller
{
    use SessionTrait, GeneralTrait;
    public function __construct()
    {
        //$this->middleware('user_has_permission:Permission-list')->only('index','show');
        //$this->middleware('user_has_permission:Permission-create')->only('create');
        //$this->middleware('user_has_permission:Permission-write')->only('edit');
     }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['permissionsWithRoles'] = Permission::with('roles')->with("users")->get();
        return view('user-management.permission.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user-management.permission.create');
    }

    public function store(PermissionRequest $request)
    {
        $validated = $request->validated();
        if($validated) {
            $Permission = new Permission;
            $Permission->name = $request->name;
            $check_permission=Permission::where('name',$request->name)->first();
            if(empty($check_permission)){
            $Permission->save();
                Alert::success('Permission', 'Successfully created');
                return redirect()->route('permissions.index');
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $permission = Permission::where("id", $id)->first();

        return view('user-management.permission.edit', compact("permission"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PermissionRequest $request, $id)
    {
        $validated = $request->validated();

        if($validated) {
        $permission = Permission::find($id);
                if( $request->has("name") ){
                    $permission->name = $request->post("name");
                }
                $permission->save();

                if( $permission ) {
                    Alert::success('Permission', 'Successfully updates');
                    return redirect()->route('permissions.index');
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
        //
    }
    public function getPermissionLists(Request $request ){


        $query = Permission::with('roles')->with("users");

        /*$query->whereNull("deleted")
            ->orWhere("deleted", "=",0);*/


        return Datatables::of($query)
            ->addIndexColumn()
            ->addColumn('userRole', function ($row) {
                $html = null;
                if (!$row->roles->isEmpty()){
                    foreach ($row->roles as $role) {
                        $html .= '<div class="badge badge-light-primary fs-7 me-2"> ' . $role->name . ' </div>';
                    }
                }
                else {
                    $html .= '<div class="badge badge-light-danger fs-7"> not assigned to any role </div>';
                }
                return $html;
            })
            ->editColumn('created_at', function ($row) {
                return Carbon::parse($row->created_at)->format('d M Y');
            })
            ->addColumn('action', function ($row) {
                $user = Helpers::loggedInUserObject();
                $html = "";
                if ($user->can("Permission=write")) {
                    $html = '<a href="' . route("permissions.edit", $row->id) . '" class="btn-sm btn btn-clean btn-icon btn-light-primary p-0" title="Edit details" data-type="edit">
                                <i class="fa fa-pencil-alt"></i>
                            </a>';
                }

                return $html;
            })
            ->rawColumns(['userRole', 'action', 'created_at', 'userInfo', 'userPermissions'])
            ->make(true);

    }
    public function getPermissionsByRole( Request $request )
    {
        if ($request->id === "only_permissions" ){
            $permissions = Permission::all();
            $selectedPermissions = [];
        }
        else {

            /*$id = (integer) $request->id;
            $role = Role::where("id", $id)
                ->with(["permissions" => function($query){
                    $query->select('name', 'read', 'create', 'write');}])
                ->first();

            $permissions = $role->permissions;*/

            $ids = explode(",", $request->id);
            $roles = Role::whereIn("id", $ids)
                ->pluck("id")
                ->toArray();
            $permissions = Permission::orderBy("name", "ASC")->get();
            $roleWisePermissions = DB::table(config('permission.table_names.role_has_permissions'))
                ->leftJoin(config('permission.table_names.permissions'), config('permission.table_names.role_has_permissions').".permission_id", config('permission.table_names.permissions').".id")
                ->whereIn("role_id", $roles)
                ->select(config('permission.table_names.permissions').".name", config('permission.table_names.role_has_permissions').".create", config('permission.table_names.role_has_permissions').".read", config('permission.table_names.role_has_permissions').".write")
                ->groupBy(config('permission.table_names.permissions').".name", config('permission.table_names.role_has_permissions').".create", config('permission.table_names.role_has_permissions').".read", config('permission.table_names.role_has_permissions').".write")
                ->orderBy(config('permission.table_names.permissions').".name")
                ->get();

            $selectedPermissions = self::roleWiseSelectedPermissions( $roleWisePermissions, "role" );

        }

        return view("user-management.user.include.permissions", compact("permissions", "selectedPermissions"));
    }
}
