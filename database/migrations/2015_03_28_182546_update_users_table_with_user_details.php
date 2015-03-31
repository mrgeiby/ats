<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateUsersTableWithUserDetails extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::table('users', function(Blueprint $table)
        {
            $table->dropColumn('name');
            $table->string('firstName', 100);
            $table->string('lastName', 100);
            $table->string('address', 255);
            $table->string('town', 100);
            $table->string('postCode', 9);
            $table->string('phoneNumber', 13);
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
