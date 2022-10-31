<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->bigIncrements('id');
            $table->string('slug')->nullable();
            $table->decimal('price', 12,2)->default(0.00);
            $table->boolean('active')->default(0);
            $table->boolean('new')->default(0);
            $table->integer('stock')->default(0);
            $table->unsignedBigInteger('category_id')->nullable();
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('set null');

            $table->bigInteger('color_id')->unsigned()->nullable();
            $table->bigInteger('size_id')->unsigned()->nullable();
            $table->foreign('color_id')->references('id')->on('product_colors')->onDelete('cascade');
            $table->foreign('size_id')->references('id')->on('product_sizes')->onDelete('cascade');

            $table->bigInteger('parent_id')->unsigned()->nullable();
            $table->foreign('parent_id')->references('id')->on('products')->onDelete('cascade');
           
            $table->timestamps();
        });

        Schema::create('product_translations', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->string('name');
            $table->longText('description')->nullable();
            // $table->longText('description_more')->nullable();

            $table->bigInteger('product_id')->unsigned();
            $table->string('locale')->index();
            $table->unique(['product_id', 'locale']);
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
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
        Schema::dropIfExists('product_translations');
        Schema::dropIfExists('products');
    }
}
