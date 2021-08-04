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
		Schema::create('orders', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('user_id')->nullable();
			$table->text('invoice_id')->nullable();
			$table->mediumText('billing_name')->nullable();
			$table->mediumText('billing_email')->nullable();
			$table->mediumText('billing_phone')->nullable();
			$table->mediumText('billing_address')->nullable();
			$table->mediumText('billing_city')->nullable();
			$table->mediumText('billing_state')->nullable();
			$table->mediumText('billing_zip')->nullable();
			$table->text('shipping_address')->nullable();
			$table->text('shipping_city')->nullable();
			$table->text('shipping_state')->nullable();
			$table->text('shipping_zip')->nullable();
			$table->text('status')->nullable();
			$table->text('ordered_items')->nullable();
			$table->timestamps();
			$table->text('payment_method')->nullable();
			$table->text('pp_invoice_id')->nullable();
			$table->double('total_amount')->nullable();
			$table->text('conditions')->nullable();
			$table->double('discount')->nullable();
			$table->double('discounted_subtotal')->nullable();
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
		Schema::drop('orders');
	}
}
