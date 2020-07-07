<?php

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Role;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_superadmin = Role::where('name', 'super_admin')->first();
        $role_admin = Role::where('name', 'admin')->first();
        $role_user = Role::where('name', 'user')->first();
        
        // Super Admin
        $superAdmin = new User();
        $superAdmin->name = 'Super Admin';
        $superAdmin->email = 'superadmin@ks.dev';
        $superAdmin->password = bcrypt('password');
        $superAdmin->save();
        $superAdmin->attachRole($role_superadmin);
        
        // Admin
        $admin = new User();
        $admin->name = 'Administrator';
        $admin->email = 'admin@ks.dev';
        $admin->password = bcrypt('password');
        $admin->save();
        $admin->attachRole($role_admin);

        // User
        $teacher = new User();
        $teacher->name = 'User';
        $teacher->email = 'user@ks.dev';
        $teacher->password = bcrypt('password');
        $teacher->save();
        $teacher->attachRole($role_user);
        
        

    }
}
