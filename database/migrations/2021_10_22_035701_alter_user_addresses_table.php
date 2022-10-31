<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterUserAddressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
	    	Schema::disableForeignKeyConstraints();
		Schema::dropIfExists('user_addresses');
		Schema::create('user_addresses', function (Blueprint $table) {
		$table->bigIncrements('id');
		$table->string('contact_name')->nullable();
		$table->string('contact_mobile')->nullable();
		$table->string('country_code')->nullable();

		$table->text('street_address_line1')->nullable();
		$table->text('street_address_line2')->nullable();

		$table->text('city_department')->nullable();
		$table->string('zip_code')->nullable();

		$table->boolean('default')->default(0);
		$table->unsignedBigInteger('state_id')->nullable();
		$table->foreign('state_id')->references('id')->on('locations')->onDelete('set null');

		$table->unsignedBigInteger('user_id')->nullable();
		$table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
		/************/
		$table->text('card_holder_name')->nullable();
			$table->string('card_type')->default('visa');
			$table->text('card_issuing_bank')->nullable();
			$table->text('card_number')->nullable();
			$table->text('card_expiration_month')->nullable();
			$table->text('card_expiration_year')->nullable();
			$table->text('card_security_code')->nullable();

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
        //
    }
}
