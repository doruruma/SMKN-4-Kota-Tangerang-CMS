<?php

use Illuminate\Database\Seeder;
use App\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User;
        $user->role_id = 1;
        $user->name = "Super Admin";
        $user->email = "admin@admin.com";
        $user->password = bcrypt('password');
        $user->save();
    }
}
