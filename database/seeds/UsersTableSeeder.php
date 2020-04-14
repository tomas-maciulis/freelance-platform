<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $administrator = factory(App\User::class)->make();
        $administrator->email = 'administrator@test.com';
        $administrator->user_type_id = App\UserType::where('name', 'administrator')->first()->id;
        $administrator->save();

        factory(App\User::class, 20)->create();
    }
}
