<?php

use Illuminate\Database\Seeder;

class AdCategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\AdCategory::class, 5)->create();
    }
}
