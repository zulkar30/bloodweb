<?php

namespace Database\Seeders;

use App\Models\MasterData\Role;
use Illuminate\Database\Seeder;
use App\Models\MasterData\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PermissionRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Super Admin
        $admin_permissions = Permission::all();
        Role::findOrFail(1)->permission()->sync($admin_permissions->pluck('id'));

        // Admin
        $user_permissions = $admin_permissions->filter(function ($permission) {
            return substr($permission->name, 0, 5) != 'user_' && substr($permission->name, 0, 5) != 'role_' && substr($permission->name, 0, 11) != 'permission_' && substr($permission->name, 0, 22) != 'dashboard_super_admin_';
        });
        Role::findOrFail(2)->permission()->sync($user_permissions);
    }
}
