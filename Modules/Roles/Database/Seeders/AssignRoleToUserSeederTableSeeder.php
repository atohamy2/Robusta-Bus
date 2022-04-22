<?php

namespace Modules\Roles\Database\Seeders;

use Modules\Users\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class AssignRoleToUserSeederTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        app()['cache']->forget('spatie.permission.cache');

        $user = User::first();
        $user->assignRole(Role::first()->name);
    }
}