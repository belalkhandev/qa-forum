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
        $role_admin = Role::where('name', 'administrator')->first();
        $role_teacher = Role::where('name', 'teacher')->first();
        $role_student = Role::where('name', 'student')->first();
        
        // Super Admin
        $superAdmin = new User();
        $superAdmin->name = 'Super Admin';
        $superAdmin->email = 'superadmin@school.dev';
        $superAdmin->password = bcrypt('password');
        $superAdmin->save();
        $superAdmin->attachRole($role_superadmin);
        
        // Admin
        $admin = new User();
        $admin->name = 'Administrator';
        $admin->email = 'admin@school.dev';
        $admin->password = bcrypt('password');
        $admin->save();
        $admin->attachRole($role_admin);

        // Teacher
        $teacher = new User();
        $teacher->name = 'Teacher';
        $teacher->email = 'teacher@school.dev';
        $teacher->password = bcrypt('password');
        $teacher->save();
        $teacher->attachRole($role_teacher);

        // Student
        $student = new User();
        $student->name = 'student';
        $student->email = 'student@school.dev';
        $student->password = bcrypt('password');
        $student->save();
        $student->attachRole($role_student);
        
        

    }
}
