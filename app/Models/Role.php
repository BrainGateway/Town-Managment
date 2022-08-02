<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role as SpatieRole;

class Role extends SpatieRole
{
    use HasFactory;

    /**
     * A role may be given various permissions.
     */
    public function permissions(): BelongsToMany
    {
        return $this->belongsToMany(
            config('permission.models.permission'),
            config('permission.table_names.role_has_permissions'),
            'role_id',
            'permission_id'
        )->withPivot("create", "read", "write");
    }

    /**
     * A role may be given various permissions.
     */
    public static function deleteRole( $id )
    {

        $flag = false;
        $role = Role::find($id);
        $checkModelHasRole = DB::table(config('permission.table_names.model_has_roles'))
            ->where(config('permission.table_names.model_has_roles').".role_id", $id)
            ->select("role_id")
            ->get();

        if( !empty($checkModelHasRole) && count($checkModelHasRole) > 0 ) {
            return $flag;
        } else {
            if ($role->delete()) {
                $flag = true;
                $role->deleted = 1;
                $role->deleted_by = auth()->user()->id;
                $role->save();
            }
            return $flag;
        }


    }
}
