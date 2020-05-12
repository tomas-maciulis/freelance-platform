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
            $table->unsignedBigInteger('user_id');
            $table->unsignedSmallInteger('work_category_id');
            $table->unsignedBigInteger('bid_id')->nullable();
            $table->string('title', 100);
            $table->text('body');
            $table->decimal('price_floor', 8,2);
            $table->decimal('price_ceiling', 8,2);
            $table->unsignedSmallInteger('active_for');
            $table->string('product_url')->nullable();
            $table->text('product_instructions')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('work_category_id')->references('id')->on('work_categories');
//            TODO: make this work
//            $table->foreign('bid_id')->references('id')->on('bids');
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
