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
            'super_admin'       => ['Logs', 'job logs','User Management','Block', 'Town', 'Plot', 'Installment', 'Plot Sale', 'Plot Type', 'Plot Size',],
            'town_admin'        => ['Logs', 'job logs','User Management','Block', 'Town', 'Plot', 'Installment', 'Plot Sale', 'Plot Type', 'Plot Size',],
            'town_employee'     => ['Logs', 'job logs','User Management','Block', 'Town', 'Plot', 'Installment', 'Plot Sale', 'Plot Type', 'Plot Size',],
            'plot_owner'        => ['Logs', 'job logs','User Management','Block', 'Town', 'Plot', 'Installment', 'Plot Sale', 'Plot Type', 'Plot Size',],
            'nominee'           => ['Logs', 'job logs','User Management','Block', 'Town', 'Plot', 'Installment', 'Plot Sale', 'Plot Type', 'Plot Size',],
            'middle_man'        => ['Logs', 'job logs','User Management','Block', 'Town', 'Plot', 'Installment', 'Plot Sale', 'Plot Type', 'Plot Size',],
            'temp_admin'        => ['Logs'],

        ];
        /**
         * @note Lets Generate Permissions
         */
        $Logs_permission                = Permission::create(['name' => 'Logs','guard_name'=> 'sanctum']);
        $User_Management_permission     = Permission::create(['name' => 'User Management','guard_name'=> 'sanctum']);
        $Block_permission               = Permission::create(['name' => 'Block','guard_name'=> 'sanctum']);
        $Town_permission                = Permission::create(['name' => 'Town','guard_name'=> 'sanctum']);
        $Plot_permission                = Permission::create(['name' => 'Plot','guard_name'=> 'sanctum']);
        $Installment_permission         = Permission::create(['name' => 'Installment','guard_name'=> 'sanctum']);
        $Plot_Sale_permission           = Permission::create(['name' => 'Plot Sale','guard_name'=> 'sanctum']);
        $Plot_Type_permission           = Permission::create(['name' => 'Plot Type','guard_name'=> 'sanctum']);
        $Plot_Size_permission           = Permission::create(['name' => 'Plot Size','guard_name'=> 'sanctum']);

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
            $Block_permission->id,
            $Town_permission->id,
            $Plot_permission->id,
            $Installment_permission->id,
            $Plot_Sale_permission->id,
            $Plot_Type_permission->id,
            $Plot_Size_permission->id,

        ];

        $assignTownAdminRolePermissionIdsToRights = [
            $Logs_permission->id,
            $User_Management_permission->id,
            $Block_permission->id,
            $Town_permission->id,
            $Plot_permission->id,
            $Installment_permission->id,
            $Plot_Sale_permission->id,
            $Plot_Type_permission->id,
            $Plot_Size_permission->id,
        ];

        $assignTownEmployeeRolePermissionIdsToRights = [
            $Logs_permission->id,
            $User_Management_permission->id,
            $Block_permission->id,
            $Town_permission->id,
            $Plot_permission->id,
            $Installment_permission->id,
            $Plot_Sale_permission->id,
            $Plot_Type_permission->id,
            $Plot_Size_permission->id,
        ];

        $assignPloteOwnerRolePermissionIdsToRights = [
            $Logs_permission->id,
            $User_Management_permission->id,
            $Block_permission->id,
            $Town_permission->id,
            $Plot_permission->id,
            $Installment_permission->id,
            $Plot_Sale_permission->id,
            $Plot_Type_permission->id,
            $Plot_Size_permission->id,
        ];

        $assignNomineeRolePermissionIdsToRights = [
            $Logs_permission->id,
            $User_Management_permission->id,
            $Block_permission->id,
            $Town_permission->id,
            $Plot_permission->id,
            $Installment_permission->id,
            $Plot_Sale_permission->id,
            $Plot_Type_permission->id,
            $Plot_Size_permission->id,
        ];

        $assignMiddleManRolePermissionIdsToRights = [
            $Logs_permission->id,
            $User_Management_permission->id,
            $Block_permission->id,
            $Town_permission->id,
            $Plot_permission->id,
            $Installment_permission->id,
            $Plot_Sale_permission->id,
            $Plot_Type_permission->id,
            $Plot_Size_permission->id,
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
        ];
        $this->addRightsToRoleHasPermissions( $assigntemp_super_adminRolePermissionIdsToRights, $temp_super_admin->id );
        Role::create(['name' => 'Town Admin','guard_name'=> 'sanctum'])->givePermissionTo($assignTownAdminRolePermissionIdsToRights);
        Role::create(['name' => 'Town Employee','guard_name'=> 'sanctum'])->givePermissionTo($assignTownEmployeeRolePermissionIdsToRights);
        Role::create(['name' => 'Plot Owner','guard_name'=> 'sanctum'])->givePermissionTo($assignPloteOwnerRolePermissionIdsToRights);
        Role::create(['name' => 'Nominee','guard_name'=> 'sanctum'])->givePermissionTo($assignNomineeRolePermissionIdsToRights);
        Role::create(['name' => 'Middle Man','guard_name'=> 'sanctum'])->givePermissionTo($assignMiddleManRolePermissionIdsToRights);

        $this->addRightsToRoleHasPermissions( $assignTownAdminRolePermissionIdsToRights, Role::where("name", 'Town Admin')->first()->id );
        $this->addRightsToRoleHasPermissions( $assignTownEmployeeRolePermissionIdsToRights, Role::where("name", 'Town Employee')->first()->id );
        $this->addRightsToRoleHasPermissions( $assignPloteOwnerRolePermissionIdsToRights, Role::where("name", 'Plot Owner')->first()->id );
        $this->addRightsToRoleHasPermissions( $assignNomineeRolePermissionIdsToRights, Role::where("name", 'Nominee')->first()->id );
        $this->addRightsToRoleHasPermissions( $assignMiddleManRolePermissionIdsToRights, Role::where("name", 'Middle Man')->first()->id );

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
