<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfessionalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('professionals', function (Blueprint $table) {
            $table->bigIncrements('professional_id');
            $table->string('name_company');
            $table->string('img');
            $table->string('name_contact');
            $table->string('status_juridique');
            $table->string('number_rc');
            $table->string('number_tahiti');
            $table->string('number_phone');
            $table->string('mail');
            $table->integer('subcategory_id');
            $table->integer('price');
            $table->integer('user_id')->nullable();


            $table->string('address');
            $table->string('city');
            $table->float('lon',25,10);
            $table->float('lat',25,10);

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
        Schema::dropIfExists('professionals');
    }
}
