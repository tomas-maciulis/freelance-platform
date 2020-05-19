<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEducationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('educations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('cv_id');
            $table->unsignedSmallInteger('education_degree_id');
            $table->string('education_provider')->nullable();
            $table->string('specialty')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('cv_id')->references('id')->on('cvs');
            $table->foreign('education_degree_id')->references('id')->on('education_degrees');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('educations');
    }
}
