<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCouponsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('coupons', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('coupon')->unique();
            // $table->enum('type', ['amount', 'percentage'])->default('amount')->nullable();
            $table->bigInteger('value')->nullable();
            $table->boolean('active')->default(0);
            $table->timestamps();
        });

        Schema::create('coupons_has_products', function (Blueprint $table) {
            $table->bigIncrements('id');
             $table->unsignedBigInteger('coupon_id')->nullable();
             $table->unsignedBigInteger('product_id')->nullable();
            $table->foreign('coupon_id')->references('id')->on('coupons')->onDelete('cascade');
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
            $table->timestamps();
        });
        Schema::create('coupons_has_categories', function (Blueprint $table) {
            $table->bigIncrements('id');
             $table->unsignedBigInteger('coupon_id')->nullable();
             $table->unsignedBigInteger('category_id')->nullable();
            $table->foreign('coupon_id')->references('id')->on('coupons')->onDelete('cascade');
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
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
        Schema::dropIfExists('coupons');
        Schema::dropIfExists('coupons_has_products');
        Schema::dropIfExists('coupons_has_categories');
    }
}
