<?php

use App\Gender;
use Illuminate\Database\Seeder;

class GendersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $male = new Gender(['name' => 'male']);
        $male->save();

        $female = new Gender(['name' => 'female']);
        $female->save();

        factory(Gender::class, 2)->create();
    }
}
