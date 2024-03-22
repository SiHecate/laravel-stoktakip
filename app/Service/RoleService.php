<?php

namespace App\Service;

use jeremykenedy\LaravelRoles\Models\Role;
use App\Models\User;

class RoleService {

    public function roleAttachAdmin() {
        $adminUser = Role::where('name', 'admin')->first();

        if ($adminUser && $user = User::where('email', 'admin@admin.com')->first()) {
            $user->attachRole($adminUser);
        }
    }


    public function roleAttachUser($userEmail) {

        $userRole = Role::where('name', 'User')->first();


        // If user not admin create new user with user Role
        if ($userRole) {
            if ($userRole && $user = User::where('email', $userEmail)->first()) {
                $user->attachRole($userRole);
            }
        }
    }

}


/*

    $user = config('roles.models.defaultUser')::find($id);
    $user->attachRole($adminRole); // you can pass whole object, or just an id
    $user->detachRole($adminRole); // in case you want to detach role
    $user->detachAllRoles(); // in case you want to detach all roles
    $user->syncRoles($roles); // you can pass Eloquent collection, or just an array of ids

*/


/*

    Model::unguard();

        $this->call(PermissionsTableSeeder::class);
        $this->call(RolesTableSeeder::class);
        $this->call(ConnectRelationshipsSeeder::class);
        $this->call('UsersTableSeeder');

    Model::reguard();

*/
