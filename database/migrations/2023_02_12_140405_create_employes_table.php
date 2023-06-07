<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employes', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->bigInteger('com_code');
            $table->string('last_name');
            $table->string('no_employee');
            $table->date('date_hiring');
            $table->string('job_title');
            $table->string('number_phone1');
            $table->string('number_phone2')->nullable();
            $table->string('email');
            $table->string('city');
            $table->string('district');
            $table->string('street');
            $table->string('account_number')->nullable();
            $table->string('name_bank')->nullable();
            $table->string('statement')->nullable();
            $table->string('permission')->nullable();
            $table->string('name_user')->nullable();
            $table->string('password1')->nullable();
            $table->string('password2')->nullable();
            $table->string('sub')->nullable();
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
        Schema::dropIfExists('employes');
    }
}
