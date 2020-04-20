<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJobExperiencesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('job_experiences', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('cv_id');
            $table->unsignedSmallInteger('education_degree_id');
            $table->unsignedSmallInteger('work_category_id')->nullable();
            $table->string('education_provider')->nullable();
            $table->string('specialty')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('cv_id')->references('id')->on('cvs');
            $table->foreign('education_degree_id')->references('id')->on('education_degrees');
            $table->foreign('work_category_id')->references('id')->on('work_categories');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('job_experiences');
    }
}
