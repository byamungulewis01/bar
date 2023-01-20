<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use App\Models\Admin;

class RolesAndPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $perms = [
            'create-users',
            'edit-users',
            'delete-users',
            'view-users',
            'user-profile',
            'set-user-status',

            'view-inactive',
            'activate-inactive',

            'create-org',
            'edit-org',
            'delete-org',
            'view-org',

            'create-meeting',
            'edit-meeting',
            'delete-meeting',
            'view-meeting',
            'make-attendance',
            'view-attendance',
            'send-invitation',
            'notify-invitees',
            'upload-minutes',


            'create-roles',
            'edit-roles',
            'delete-roles',
            'view-roles'
        ];
        foreach($perms as $perm){
            Permission::create(['name' => $perm]);
            Permission::create(['guard_name'=> 'org','name' => $perm]);
        }
        

        $adminRole = Role::create(['guard_name'=> 'admin', 'name' => 'Super admin']);
        $user = Admin::first();
        $user->syncRoles('Super admin');
        // $adminRole->givePermissionTo([
        //     'create--users',
        //     'edit--users',
        //     'delete--users',
        //     'view--users',
        //     'user--profile',
        //     'set--user--status',
        //     'create--meeting',
        //     'edit--meeting',
        //     'delete--meeting',
        //     'view--meeting',
        //     'make--attendance',
        //     'view--attendance',
        //     'send--invitation',
        //     'notify--invitees',
        //     'upload--minutes',
        //     'create--roles',
        //     'edit--roles',
        //     'delete--roles',
        //     'view--roles'
        // ]);
        
    }
}
