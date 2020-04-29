<?php

use Illuminate\Database\Seeder;

class EduactionDegreeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\EducationDegree::class, 10)->create();
    }
}
