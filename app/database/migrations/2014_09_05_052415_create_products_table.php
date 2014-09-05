<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('products', function($table){
			$table->increments('id');
			$table->string('name')->unique();
			$table->string('title')->nullable();
			$table->string('sku')->unique();
			$table->text('description')->nullable();
			$table->string('short_description')->nullable();
			$table->string('meta_description')->nullable();
			$table->text('meta_keywords')->nullable();	
			$table->string('url_name')->nullable();
			$table->float('base_price')->default(00.00);
			$table->integer('cost')->nullable();
			$table->tinyInteger('enabled')->default(1);
			$table->tinyInteger('is_on_sale')->default(0);
			$table->float('sale_price_or_discount')->nullable();
			$table->integer('in_stock_amount')->nullable();
			$table->string('created_by')->nullable();
			$table->string('updated_by')->nullable();
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
