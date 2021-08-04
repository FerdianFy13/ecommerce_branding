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
		Schema::create('products', function(Blueprint $table)
		{
			$table->increments('id');
			$table->text('title')->nullable();
			$table->text('slug')->nullable();
			$table->integer('category_id')->nullable();
			$table->mediumText('small_description')->nullable();
			$table->mediumText('large_description')->nullable();
			$table->double('regular_price')->nullable();
			$table->double('discounted_price')->nullable();
			$table->text('sku')->nullable();
			$table->integer('quantity')->nullable();
			$table->timestamps();
			$table->text('primary_image')->nullable();
			$table->text('other_image')->nullable();
			$table->text('featured')->nullable();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('products');
	}
}
