<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProducts extends Migration
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
            $table->string('name', 64)->comment('product name');
            $table->bigInteger('category_id')->comment('category of product')
                ->foreign('category_id')->references('id')->on('categories');
            $table->string('description', 200)->nullable()->comment('short product description');
            $table->integer('qty')->default(0)->comment('stock level');
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
