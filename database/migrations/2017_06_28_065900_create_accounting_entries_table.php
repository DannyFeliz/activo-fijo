<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAccountingEntriesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('accounting_entries', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->text('description', 16)->nullable();
			$table->integer('inventory_type_id')->nullable();
			$table->string('accounting_account', 50)->nullable();
			$table->date('accounting_date')->nullable();
			$table->decimal('amount_accounting_entry', 10)->nullable();
			$table->smallInteger('status')->nullable();
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
		Schema::drop('accounting_entries');
	}

}
