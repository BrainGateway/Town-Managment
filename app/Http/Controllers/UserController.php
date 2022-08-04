<?php

namespace App\Http\Controllers;

use App\Http\Controllers\TraitClasses\SessionTrait;
use App\Http\Controllers\Traits\GeneralTrait;
use App\Models\User;
use Carbon\Carbon;
use App\Helpers\Helpers;
use App\Http\Requests\UserPasswordChanged;
use App\Http\Requests\UserRequest;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Yajra\DataTables\Facades\DataTables;

class UserController extends Controller
{
    use GeneralTrait;
    use SessionTrait;
    public function __construct()
    {
        $this->middleware('user_has_permission:User-list')->only('index','show');
        $this->middleware('user_has_permission:User-create')->only('create');
        $this->middleware('user_has_permission:User-write')->only('edit');
     }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('user-management.user.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::select('id', 'name')
        ->orderBy("id", "ASC")
        ->get();
        $permissions = Permission::select('id', 'name')->orderBy("name", "ASC")->get();
        $selectedPermissions = [];

        $getUserRole = Helpers::loggedInUserRole();
        $countryIdsList = json_decode( auth()->user()->country_ids );

        return view('user-management.user.create', compact("roles", "permissions", "selectedPermissions", "getUserRole"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        $validated = $request->validated();

        if($validated) {

            $user = User::createUser( $request );
           // dd($user);

            if( $user ) {
                Alert::success('User', 'Successfully created');
                return redirect()->route('users.index');
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
        $roles = Role::select('id', 'name', 'detail')
        ->get();
    $permissions = Permission::select('id', 'name', 'detail')->orderBy("name", "ASC")->get();
    $roleWisePermissions = "";
    $user = User::with(["roles" => function($query){

        }])
        ->with(["permissions" => function($query){
        $query->select('name', 'read', 'create', 'write');
        }])
        ->find($id);


    if( $user->permissions->isEmpty() ){
        $getuserRole = $user->roles->first();
        if( !empty($getuserRole) ){
            $getRoleWisePermissions = Role::where("id", $getuserRole->id)->with(["permissions" => function($query){
                $query->select('name', 'read', 'create', 'write');}])->first();
            $roleWisePermissions = $getRoleWisePermissions->permissions;
        }
    } else {
        $roleWisePermissions = $user->permissions;
    }

    if( !empty($roleWisePermissions) ){
        $selectedPermissions = self::modelWiseSelectedPermissions( $roleWisePermissions );
    } else {
        $selectedPermissions = "";
    }

    return view('user-management.user.show', compact("user", "roles", "permissions", "selectedPermissions"));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $roles = Role::select('id', 'name', 'detail')
            ->get();
        //$permissions = Permission::select('id', 'name', 'detail')->get();
        $permissions = Permission::select('id', 'name', 'detail')->orderBy("name", "ASC")->get();
        $roleWisePermissions = "";
        $user = User::with(["roles" => function($query){

            }])
            ->with(["permissions" => function($query){
            $query->select('name', 'read', 'create', 'write');
            }])
            ->find($id);


        if( $user->permissions->isEmpty() ){
            $getuserRole = $user->roles->first();
            if( !empty($getuserRole) ){
                $getRoleWisePermissions = Role::where("id", $getuserRole->id)->with(["permissions" => function($query){
                    $query->select('name', 'read', 'create', 'write');}])->first();
                $roleWisePermissions = $getRoleWisePermissions->permissions;
            }
        } else {
            $roleWisePermissions = $user->permissions;
        }

        if( !empty($roleWisePermissions) ){
            $selectedPermissions = self::modelWiseSelectedPermissions( $roleWisePermissions );
        } else {
            $selectedPermissions = "";
        }

        return view('user-management.user.edit', compact("user", "roles", "permissions", "selectedPermissions"));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserRequest $request, $id)
    {
        $validated = $request->validated();

        if($validated) {

            $user = User::updateUser( $request, $id );
            app()['cache']->forget('spatie.permission.cache');
            if( $user ) {
                Alert::success('User', 'Successfully updated');
                return redirect()->route('users.index');
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
            $deleteData = User::where('id',$id)->delete();
            if( $deleteData ) {
                $msgArray = [
                    "code"  => 0,
                    "status"    => "success",
                    "message"   => "Successfully deleted!..",
                ];
                return $msgArray;
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
    public function getUsersLists( Request $request )
    {

        $query = User::whereIn('user_level',[config('app.user_level'),'god'])->with("roles")->with("permissions");

        if ($request->ajax()) {

            if (!empty($request->get('user_title')) && empty($request->get("reset")) ) {
                $query->where('id', $request->get('user_title'));
            }
            if (!empty($request->get('user_role')) && empty($request->get("reset")) ) {
                $searchRole = $request->get('user_role');
                $query->whereHas('roles', function($query) use($searchRole) {
                    $query->where('id', $searchRole);
                });
            }
            if (!empty($request->get('user_permission')) && empty($request->get("reset")) ) {
                $searchRole = $request->get('user_permission');
                $query->whereHas('permissions', function($query) use($searchRole) {
                    $query->where('id', $searchRole);
                });
            }
            if (!empty($request->get('all_search')) && empty($request->get("reset")) ) {
                $query->where(function($q) use($request){

                    $search = $request->get('all_search');
                    $q->orWhere('name', 'LIKE', "%$search%")
                        ->orWhere('id', 'LIKE', "%$search%")
                        ->orWhere('email', 'LIKE', "%$search%");

                });
            }

        }




        //return $query->get();

        return Datatables::of($query)
            ->addIndexColumn()
            ->addColumn('userInfo', function ($row) {
                $edit_hrf='';
                if ($row->can("User=write")) {
                    $edit_hrf=route("users.edit", $row->id);
                }

                    $html = '<div class="d-flex align-items-center">
                    <div class="symbol symbol-circle symbol-50px overflow-hidden me-3">
                                <a href="' . $edit_hrf. '">
                                    <div class="symbol-label fs-3 bg-light-danger text-danger">
                                    '.mb_substr($row->first_name.' '.$row->last_name, 0, 1).'
                                    </div>
                                </a>
                            </div>
                            <div class="d-flex flex-column">
                                <a href="' . $edit_hrf. '" class="text-gray-800 text-hover-primary mb-1">
                                    '.$row->first_name.' '.$row->last_name.'
                                </a>
                                <span>'.$row->email.'</span>
                            </div>
                    </div>
                    ';

                return $html;
            })
            ->addColumn('userRole', function ($row) {
                $html = null;
                if (!$row->roles->isEmpty()){
                    foreach ($row->roles as $role) {
                        $html .= '<div class="badge badge-light-primary fs-7"> ' . $role->name . ' </div>';
                    }
                }
                else {
                    $html .= '<div class="badge badge-light-danger fs-7"> No record found </div>';
                }
                return $html;
            })
            ->addColumn('userPermissions', function ($row) {
                $permissionHtml = null;
                if (!$row->permissions->isEmpty()) {
                    foreach ($row->permissions as $permission) {
                        $permissionHtml .= '<div class="badge badge-light-primary fs-7"> ' . $permission->name . ' </div>';
                    }
                }
                else {
                    $permissionHtml .= '<div class="badge badge-light-danger fs-7"> No record found </div>';
                }
                return $permissionHtml;
            })
            ->editColumn('created_at', function ($row) {
                return Carbon::parse($row->created_at)->format('d M Y');
            })
            ->addColumn('action', function ($row) {
                $user = $row;
                $html = "";
                if ($user->can("User=write")) {
                    $html = '<a href="' . route("users.edit", $row->id) . '" class="btn-sm btn btn-clean btn-icon btn-light-primary me-2 p-0 " data-type="edit" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit this User">
                                <i class="fa fa-pencil-alt"></i>
                            </a>';
                    $html .= '<a href="javascript:void(0);" class="btn-sm btn btn-clean btn-icon btn-light-danger p-0 delete-action" data-delete="' . $row->id . '" title="delete details" data-type="edit" data-bs-toggle="tooltip" data-bs-placement="top" title="Delete this User">
                                <i class="fa fa-trash"></i>
                            </button>';
                }
                return $html;
            })
            ->rawColumns(['userRole', 'action', 'created_at', 'userInfo', 'userPermissions'])
            ->make(true);

    }
    public function updatePassword(UserPasswordChanged $request, $id)
    {
        $validated = $request->validated();

        if($validated) {

            $user = User::updatePassword( $request, $id );

            if( $user ) {
                return $msgArray = [
                    "code"  => 0,
                    "status"    => "Success",
                    "message"   => "Password changed successfully.",
                ];
            } else {
                return $msgArray = [
                    "code"  => 1,
                    "status"    => "error",
                    "message"   => "Password not saved.",
                ];
            }

        }
    }
}
