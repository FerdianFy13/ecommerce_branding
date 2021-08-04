<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomersTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('customers', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('user_id')->nullable();
			$table->text('billing_address')->nullable();
			$table->text('billing_city')->nullable();
			$table->text('billing_state')->nullable();
			$table->text('billing_zip')->nullable();
			$table->text('shipping_address')->nullable();
			$table->text('shipping_city')->nullable();
			$table->text('shipping_state')->nullable();
			$table->text('shipping_zip')->nullable();
			$table->timestamps();
			$table->text('billing_country')->nullable();
			$table->text('shipping_country')->nullable();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('customers');
	}
}
