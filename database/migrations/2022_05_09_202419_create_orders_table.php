<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->bigIncrements('id');
           $table->string('order_id')->default(1);
            $table->enum('status', ['pending', 'paid', 'waiting_for_shipping', 'shipped', 'delivered', 'cancelled', 'refunded', 'refund_received']);
            $table->enum('payment_method', ['credit', 'pay_on_delivery'])->default('credit');
            $table->boolean('refunded')->default(0);
            
            $table->string('coupon_code')->nullable();
            $table->bigInteger('total_item_count')->nullable();
            $table->decimal('sub_total', 12, 2)->nullable();
            $table->decimal('discount', 12, 2)->nullable();
            // $table->decimal('discount_amount', 12, 2)->nullable();
            $table->decimal('shipping_price', 12, 2)->nullable();

            $table->mediumText('street_address')->nullable();
            $table->mediumText('notes')->nullable();
            $table->string('name')->nullable();
            $table->string('mobile')->nullable();
            
            $table->text('card_holder_name')->nullable();
            $table->string('card_type')->default('visa');
            $table->text('card_issuing_bank')->nullable();
            $table->text('card_number')->nullable();
            $table->text('card_expiration_month')->nullable();
            $table->text('card_expiration_year')->nullable();
            $table->text('card_security_code')->nullable();
           
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            

            $table->unsignedBigInteger('coupon_id')->nullable();
            $table->foreign('coupon_id')->references('id')->on('coupons')->onDelete('set null');
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
        Schema::dropIfExists('orders');
    }
}
