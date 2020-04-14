<?php

use App\UserType;
use Illuminate\Database\Seeder;

class UserTypesTableSeeder extends Seeder
{
    /**
     * Run the user types seed.
     *
     * @return void
     */
    public function run()
    {
        $admin = new UserType(['name' => 'administrator']);
        $admin->save();

        $user = new UserType(['name' => 'user']);
        $user->save();
    }
}
