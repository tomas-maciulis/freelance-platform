<?php

use Illuminate\Database\Seeder;

class WorkCategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\WorkCategory::class, 5)->create();
    }
}
