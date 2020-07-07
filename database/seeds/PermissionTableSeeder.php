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
        $perm2->name = 'manage_user'; // for super admin
        $perm2->display_name = 'Manage Modules';
        $perm2->description = 'can manage user module';
        $perm2->save();
    }
}
