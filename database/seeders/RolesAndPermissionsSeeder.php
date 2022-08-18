<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        app()['cache']->forget('spatie.permission.cache');
        $permissionsByRole = [
            'super_admin'       => ['Logs', 'job logs','User Management', 'User', 'Role', 'Permission', 'companies', 'categories', 'tests', 'plans', 'themes', 'transactions','releases'],
            'company_admin'     => ['Logs', 'job logs','User Management', 'User', 'companies', 'categories', 'tests', 'plans','transactions'],
            'company_tester'    => ['Logs', 'job logs', 'transactions'],
            'temp_admin'        => ['Logs'],

        ];
        /**
         * @note Lets Generate Permissions
         */
        $Logs_permission                = Permission::create(['name' => 'Logs','guard_name'=> 'sanctum']);
        $User_Management_permission     = Permission::create(['name' => 'User Management','guard_name'=> 'sanctum']);
        $User_permission                = Permission::create(['name' => 'User','guard_name'=> 'sanctum']);
        $Role_permission                = Permission::create(['name' => 'Role','guard_name'=> 'sanctum']);
        $Permission_permission          = Permission::create(['name' => 'Permission','guard_name'=> 'sanctum']);
        $job_logs_permission            = Permission::create(['name' => 'job logs','guard_name'=> 'sanctum']);
        $companies_permission           = Permission::create(['name' => 'companies','guard_name'=> 'sanctum']);
        $categories_permission          = Permission::create(['name' => 'categories','guard_name'=> 'sanctum']);
        $tests_permission               = Permission::create(['name' => 'tests','guard_name'=> 'sanctum']);
        $plans_permission               = Permission::create(['name' => 'plans','guard_name'=> 'sanctum']);
        $themes_permission              = Permission::create(['name' => 'themes','guard_name'=> 'sanctum']);
        $transactions_permission        = Permission::create(['name' => 'transactions','guard_name'=> 'sanctum']);
        $releases_permission            = Permission::create(['name' => 'releases','guard_name'=> 'sanctum']);

         /**
         * @note Lets Generate Role
         * & assign Permissions to Role
         */
        $getSuperAdminRole = Role::where("name", 'Super Admin')->first();
        if($getSuperAdminRole){
            $assignPermissionsToSuperAdminRole = $getSuperAdminRole->givePermissionTo(Permission::all());
        }else{
            $assignPermissionsToSuperAdminRole = Role::create(['name' => 'Super Admin','guard_name'=> 'sanctum'])->givePermissionTo(Permission::all());
        }
        $assignSuperAdminRolePermissionIdsToRights = [

            $Logs_permission->id,
            $User_Management_permission->id,
            $User_permission->id,
            $Role_permission->id,
            $Permission_permission->id,
            $job_logs_permission->id,
            $companies_permission->id,
            $categories_permission->id,
            $tests_permission->id,
            $plans_permission->id,
            $themes_permission->id,
            $transactions_permission->id,
            $releases_permission->id,

        ];

        $assignTownAdminRolePermissionIdsToRights = [
            $Logs_permission->id,
            $User_Management_permission->id,
            $User_permission->id,
            $companies_permission->id,
            $categories_permission->id,
            $tests_permission->id,
            $transactions_permission->id,
        ];

        $assignTownEmployeeRolePermissionIdsToRights = [
            $Logs_permission->id,
            $transactions_permission->id,
        ];

        $this->addRightsToRoleHasPermissions( $assignSuperAdminRolePermissionIdsToRights, $assignPermissionsToSuperAdminRole->id );

        $user = User::create([
            'name'=> 'Super Admin',
            'email'=>'admin@'.config('permission.table_prefix').'.com',
            'password' => Hash::make(config('permission.table_prefix')),
        ]);
        $user->assignRole(Role::where("name", 'Super Admin')->first());

        $temp_super_admin = Role::create(['name' => 'Temp Admin','guard_name'=> 'sanctum'])->givePermissionTo(Permission::whereIn('name',$permissionsByRole['temp_admin'])->get());
        $assigntemp_super_adminRolePermissionIdsToRights = [
            $Logs_permission->id,
            $job_logs_permission->id
        ];
        $this->addRightsToRoleHasPermissions( $assigntemp_super_adminRolePermissionIdsToRights, $temp_super_admin->id );
        Role::create(['name' => 'Town Admin','guard_name'=> 'sanctum'])->givePermissionTo($assignTownAdminRolePermissionIdsToRights);
        Role::create(['name' => 'Town Employee','guard_name'=> 'sanctum'])->givePermissionTo($assignTownEmployeeRolePermissionIdsToRights);
        $this->addRightsToRoleHasPermissions( $assignTownAdminRolePermissionIdsToRights, Role::where("name", 'Town Admin')->first()->id );
        $this->addRightsToRoleHasPermissions( $assignTownEmployeeRolePermissionIdsToRights, Role::where("name", 'Town Employee')->first()->id );
    }
    protected function addRightsToRoleHasPermissions( $permissionIds = null, $roleId = null ){
        if( !empty($permissionIds) && !empty($roleId) ){
            foreach( $permissionIds as $permissionId ){
                DB::table(config('permission.table_names.role_has_permissions'))
                    ->where('permission_id', $permissionId)
                    ->where('role_id', $roleId)
                    ->update(['read' => 1, 'create' => 1, 'write' => 1]);
            }
            return true;
        }
        return false;
    }
}
