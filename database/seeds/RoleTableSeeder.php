<?php

use Illuminate\Database\Seeder;
use App\Models\Role;
use App\Models\Permission;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $perm_superadmin = Permission::all();
        $perm_admin = Permission::whereNotIn('name', ['manage_admin'])->get();
        $perm_user = Permission::whereNotIn('name', ['manage_user'])->get();
       
        // Super Admin Role
        $superAdmin = new Role();
        $superAdmin->name = 'super_admin';
        $superAdmin->display_name = 'Super Admin';
        $superAdmin->description = 'Has all permissions for super administrator';
        $superAdmin->save();
        $superAdmin->attachPermissions($perm_superadmin);

        // Admin Role
        $admin = new Role();
        $admin->name = 'admin';
        $admin->display_name = 'Admin';
        $admin->description = 'Has all permissions for admin';
        $admin->save();
        $admin->attachPermissions($perm_admin);

        // Teacher Role
        $user = new Role();
        $user->name = 'user';
        $user->display_name = 'User';
        $user->description = 'Has all permissions for user';
        $user->save();
        $user->attachPermissions($perm_user);

    }
}
