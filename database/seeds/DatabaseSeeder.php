<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(GendersTableSeeder::class);
        $this->call(UserTypesTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(WorkCategoriesTableSeeder::class);
        $this->call(AdsTableSeeder::class);
    }
}
