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
            $table->string('name');
            $table->string('slug');
            $table->longText('description');
            $table->integer('price');
            $table->string('size')->nullable()->default('all');
            $table->integer('discount')->nullable();
            $table->boolean('stock');
            $table->timestamps();

            $table->index('slug');
        });

        Schema::create('product_category', function (Blueprint $table) {
            $table->bigInteger('product_id');
            $table->bigInteger('category_id');
        });

        Schema::create('product_image', function (Blueprint $table) {
            $table->bigInteger('product_id');
            $table->bigInteger('image_id');
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
        Schema::dropIfExists('products_category');
        Schema::dropIfExists('products_image');
    }
}
