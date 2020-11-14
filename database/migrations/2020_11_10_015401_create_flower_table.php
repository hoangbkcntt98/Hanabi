<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFlowerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('flower', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->unsignedBigInteger('flower_shop_id');
            $table->foreign('flower_shop_id')->references('id')->on('flower_shop');
            $table->float('price');
            $table->string('image');
            $table->string('category');
            $table->float('stars_rate')->default(0);
            $table->integer('count_rates')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('flower');
    }
}
