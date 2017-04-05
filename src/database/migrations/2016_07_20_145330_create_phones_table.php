<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePhonesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('phones', function (Blueprint $table) {
			$table->increments('id');
			$table->integer('phoneable_id');
			$table->string('phoneable_type');
			$table->integer('calling_code_id')->nullable()->default(null);
			$table->string('area_code');
			$table->string('subscriber_number');
			$table->integer('extension')->nullable()->default(null);
			$table->integer('type_id');
			$table->timestamps();
			$table->softDeletes();
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('phones');
    }
}
