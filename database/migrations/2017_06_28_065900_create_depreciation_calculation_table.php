<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDepreciationCalculationTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('depreciation_calculation', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('process_year')->nullable();
			$table->integer('process_month')->nullable();
			$table->integer('fixed_asset_id')->nullable();
			$table->date('process_date')->nullable();
			$table->decimal('despised_amount', 10)->nullable();
			$table->string('parchuse_account', 50)->nullable();
			$table->string('depreciation_account', 50)->nullable();
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
		Schema::drop('depreciation_calculation');
	}

}
