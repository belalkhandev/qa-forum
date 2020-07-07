<?php

use Illuminate\Database\Seeder;
use App\Models\Permission;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $perm1 = new Permission();
        $perm1->name = 'manage_admin'; // for super admin
        $perm1->display_name = 'Manage Admin';
        $perm1->description = 'Can create, edit or delete an admin';
        $perm1->save();

        $perm2 = new Permission();
        $perm2->name = 'manage_module'; // for super admin
        $perm2->display_name = 'Manage Modules';
        $perm2->description = 'Can manage modules';
        $perm2->save();

        $perm3 = new Permission();
        $perm3->name = 'manage_settings'; // for admin
        $perm3->display_name = 'Manage Settings';
        $perm3->description = 'Can manage settings';
        $perm3->save();

        $perm4 = new Permission();
        $perm4->name = 'manage_accounts';
        $perm4->display_name = 'Manage Accounts';
        $perm4->description = 'Can CRUD and Approve any payment issues';
        $perm4->save();

        $perm6 = new Permission();
        $perm6->name = 'manage_email';
        $perm6->display_name = 'Manage Email';
        $perm6->description = 'Can send email';
        $perm6->save();

        $perm7 = new Permission();
        $perm7->name = 'manage_reports';
        $perm7->display_name = 'Manage Reports';
        $perm7->description = 'Can generate and export reports';
        $perm7->save();

        $perm8 = new Permission();
        $perm8->name = 'manage_notice';
        $perm8->display_name = 'Manage Notices';
        $perm8->description = 'Can CRUD notices';
        $perm8->save();

        $perm9 = new Permission();
        $perm9->name = 'manage_promotion';
        $perm9->display_name = 'Manage Promotions';
        $perm9->description = 'Can promote students from one class/section to another class/section';
        $perm9->save();

        $perm10 = new Permission();
        $perm10->name = 'view_user';
        $perm10->display_name = 'View Users';
        $perm10->description = 'Can view users';
        $perm10->save();
        
        $perm11 = new Permission();
        $perm11->name = 'manage_user';
        $perm11->display_name = 'Manage User';
        $perm11->description = 'Can CRUD user\'s informations';
        $perm11->save();

        $perm12 = new Permission();
        $perm12->name = 'view_user_role';
        $perm12->display_name = 'View User Roles';
        $perm12->description = 'Can view user roles';
        $perm12->save();
        
        $perm13 = new Permission();
        $perm13->name = 'manage_user_role';
        $perm13->display_name = 'Manage User Roles';
        $perm13->description = 'Can CRUD user roles';
        $perm13->save();

        $perm14 = new Permission();
        $perm14->name = 'view_student';
        $perm14->display_name = 'View Student\'s Information';
        $perm14->description = 'Can view student\'s information';
        $perm14->save();

        $perm15 = new Permission();
        $perm15->name = 'manage_student';
        $perm15->display_name = 'Manage Student\'s Information';
        $perm15->description = 'Can update/delete student\'s information';
        $perm15->save();

        $perm16 = new Permission();
        $perm16->name = 'view_teacher';
        $perm16->display_name = 'View Teacher\'s Information';
        $perm16->description = 'Can view teacher\'s information';
        $perm16->save();

        $perm17 = new Permission();
        $perm17->name = 'manage_teacher';
        $perm17->display_name = 'Manage Teacher\'s Information';
        $perm17->description = 'Can update/delete teacher\'s information';
        $perm17->save();

        $perm18 = new Permission();
        $perm18->name = 'view_guardian';
        $perm18->display_name = 'View Guardian\'s Information';
        $perm18->description = 'Can view guardian\'s information';
        $perm18->save();

        $perm19 = new Permission();
        $perm19->name = 'manage_guardian';
        $perm19->display_name = 'Manage Guardian\'s Information';
        $perm19->description = 'Can update/delete guardian\'s information';
        $perm19->save();

        $perm20 = new Permission();
        $perm20->name = 'view_admission';
        $perm20->display_name = 'View Admission';
        $perm20->description = 'Can view admission information';
        $perm20->save();

        $perm21 = new Permission();
        $perm21->name = 'manage_admission';
        $perm21->display_name = 'Manage Admission';
        $perm21->description = 'Can CRUD admission information';
        $perm21->save();

        $perm22 = new Permission();
        $perm22->name = 'view_department';
        $perm22->display_name = 'View Department';
        $perm22->description = 'Can view department information';
        $perm22->save();

        $perm23 = new Permission();
        $perm23->name = 'manage_department';
        $perm23->display_name = 'Manage Department';
        $perm23->description = 'Can CRUD department information';
        $perm23->save();

        $perm24 = new Permission();
        $perm24->name = 'view_class';
        $perm24->display_name = 'View Class';
        $perm24->description = 'Can view class information';
        $perm24->save();

        $perm25 = new Permission();
        $perm25->name = 'manage_class';
        $perm25->display_name = 'Manage Class';
        $perm25->description = 'Can CRUD class information';
        $perm25->save();

        $perm26 = new Permission();
        $perm26->name = 'view_subject';
        $perm26->display_name = 'View Subject';
        $perm26->description = 'Can view subject information';
        $perm26->save();

        $perm27 = new Permission();
        $perm27->name = 'manage_subject';
        $perm27->display_name = 'Manage Subject';
        $perm27->description = 'Can CRUD subject information';
        $perm27->save();

        $perm28 = new Permission();
        $perm28->name = 'view_section';
        $perm28->display_name = 'View Section';
        $perm28->description = 'Can view section information';
        $perm28->save();

        $perm29 = new Permission();
        $perm29->name = 'manage_section';
        $perm29->display_name = 'Manage Section';
        $perm29->description = 'Can CRUD section information';
        $perm29->save();

        $perm30 = new Permission();
        $perm30->name = 'view_group';
        $perm30->display_name = 'View Group';
        $perm30->description = 'Can view group information';
        $perm30->save();

        $perm31 = new Permission();
        $perm31->name = 'manage_group';
        $perm31->display_name = 'Manage Group';
        $perm31->description = 'Can CRUD group information';
        $perm31->save();

        $perm32 = new Permission();
        $perm32->name = 'view_study_material';
        $perm32->display_name = 'View Study Materials';
        $perm32->description = 'Can view study materials';
        $perm32->save();

        $perm33 = new Permission();
        $perm33->name = 'manage_study_material';
        $perm33->display_name = 'Manage Study Materials';
        $perm33->description = 'Can CRUD study materials';
        $perm33->save();

        $perm34 = new Permission();
        $perm34->name = 'manage_study_material_category';
        $perm34->display_name = 'Manage Study Material Category';
        $perm34->description = 'Can CRUD study material categories';
        $perm34->save();

        $perm35 = new Permission();
        $perm35->name = 'view_exam';
        $perm35->display_name = 'View Exam Information';
        $perm35->description = 'Can view exam information';
        $perm35->save();

        $perm36 = new Permission();
        $perm36->name = 'manage_exam';
        $perm36->display_name = 'Manage Exam Information';
        $perm36->description = 'Can CRUD exam information';
        $perm36->save();

        $perm37 = new Permission();
        $perm37->name = 'manage_result';
        $perm37->display_name = 'Manage Result';
        $perm37->description = 'Can manage results';
        $perm37->save();

        $perm38 = new Permission();
        $perm38->name = 'view_routine';
        $perm38->display_name = 'View Routine';
        $perm38->description = 'Can view any routine';
        $perm38->save();

        $perm39 = new Permission();
        $perm39->name = 'manage_routine';
        $perm39->display_name = 'Manage Routine';
        $perm39->description = 'Can CRUD class/exam routine';
        $perm39->save();

        $perm40 = new Permission();
        $perm40->name = 'view_syllabus';
        $perm40->display_name = 'View Syllabus';
        $perm40->description = 'Can view academic syllabus';
        $perm40->save();

        $perm41 = new Permission();
        $perm41->name = 'manage_syllabus';
        $perm41->display_name = 'Manage Syllabus';
        $perm41->description = 'Can CRUD academic syllabus';
        $perm41->save();

        $perm42 = new Permission();
        $perm42->name = 'view_attendance';
        $perm42->display_name = 'View Attendance';
        $perm42->description = 'Can view attendance information';
        $perm42->save();
        
        $perm43 = new Permission();
        $perm43->name = 'manage_attendance';
        $perm43->display_name = 'Manage Attendance';
        $perm43->description = 'Can CRUD attendance information';
        $perm43->save();

    }
}
