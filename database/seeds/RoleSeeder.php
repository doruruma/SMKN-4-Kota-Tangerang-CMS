<?php

use Illuminate\Database\Seeder;
use App\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = new Role;
        $role->id = 1;
        $role->role = "super_admin";
        $role->save();

        $role = new Role;
        $role->id = 2;
        $role->role = "admin";
        $role->save();
    }
}
