<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name_product');
            $table->string('type_product');
            $table->string('img_product');
            $table->string('desc');
            // $table->string('seats');
            // $table->string('model'); //model
            // $table->string('fisrt_registartion'); // fisrt_registartion
            // $table->string('millage'); // millage
            // $table->string('fuel'); // fuel 
            // $table->string('engine_size'); // engine_size
            // $table->string('power'); // power
            // $table->string('color'); // color
            $table->unsignedBigInteger('categorie_id');
            $table->foreign('categorie_id')->references('id')->on('categories');
            $table->unsignedBigInteger('day_price');
            //$table->unsignedBigInteger('fine');
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
        Schema::dropIfExists('products');
    }
}
