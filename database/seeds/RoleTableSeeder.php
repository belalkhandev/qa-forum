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
        $perm_admin = Permission::whereNotIn('name', ['manage_admin', 'manage_modules'])->get();
        $perm_teacher = Permission::whereIn('name', ['view_student', 'view_teacher', 'view_attendance', 'view_syllabus', 'view_routine', 'view_exam', 'view_study_material', 'manage_teacher'])->get();
        $perm_student = Permission::whereIn('name', ['view_student', 'view_teacher', 'view_syllabus', 'view_routine', 'view_exam', 'view_study_material', 'manage_student'])->get();
       
        // Super Admin Role
        $superAdmin = new Role();
        $superAdmin->name = 'super_admin';
        $superAdmin->display_name = 'Super Admin';
        $superAdmin->description = 'Has all permissions for super administrator';
        $superAdmin->save();
        $superAdmin->attachPermissions($perm_superadmin);

        // Admin Role
        $admin = new Role();
        $admin->name = 'administrator';
        $admin->display_name = 'Administrator';
        $admin->description = 'Has all permissions for administrator';
        $admin->save();
        $admin->attachPermissions($perm_admin);

        // Teacher Role
        $admin = new Role();
        $admin->name = 'teacher';
        $admin->display_name = 'Teacher';
        $admin->description = 'Has all permissions for teacher';
        $admin->save();
        $admin->attachPermissions($perm_teacher);

        // Student Role
        $admin = new Role();
        $admin->name = 'student';
        $admin->display_name = 'Student';
        $admin->description = 'Has specific permission for student';
        $admin->save();
        $admin->attachPermissions($perm_student);

        // More to come here

    }
}
