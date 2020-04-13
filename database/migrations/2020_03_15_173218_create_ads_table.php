<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ads', function (Blueprint $table) {
            $table->id();
//todo: make user_id not nullable
            $table->unsignedBigInteger('user_id')->nullable();
            $table->unsignedSmallInteger('ad_category_id');
            $table->string('title', 100);
            $table->text('body');
            $table->decimal('price_floor', 8,2);
            $table->decimal('price_ceiling', 8,2);
            $table->unsignedSmallInteger('active_for');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('ad_category_id')->references('id')->on('ad_categories');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ads');
    }
}
