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
        $superAdmin->email = 'superadmin@qaforum.dev'; 
        $superAdmin->username = 'superadmin';
        $superAdmin->approve = 1;
        $superAdmin->approve_at = date('Y-m-d H:i:s');
        $superAdmin->password = bcrypt('password');
        $superAdmin->save();
        $superAdmin->attachRole($role_superadmin);
        
        // Admin
        $admin = new User();
        $admin->name = 'Admin';
        $admin->email = 'admin@qaforum.dev';
        $admin->username = 'admin';
        $admin->approve = 1;
        $admin->approve_at = date('Y-m-d H:i:s');
        $admin->password = bcrypt('password');
        $admin->save();
        $admin->attachRole($role_admin);
    }
}
