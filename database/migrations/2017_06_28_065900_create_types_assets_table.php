<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTypesAssetsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('types_assets', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('description');
			$table->string('accounting_accounts_purchase', 50);
			$table->string('accounting_accounts_depreciation', 50);
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
		Schema::drop('types_assets');
	}

}
