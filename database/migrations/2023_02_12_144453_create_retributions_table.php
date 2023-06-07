<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRetributionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('retributions', function (Blueprint $table) {
            $table->id();
            $table->string('name',191);
            $table->bigInteger('com_code');
            $table->string('shopname',191);
            $table->string('recordnumber',191);
            $table->date('date')->nullable();
            $table->string('phone',10);
            $table->string('facilitynumber',10);
            $table->string('email',191);
            $table->string('city',191)->nullable();
            $table->string('district',191)->nullable();
            $table->string('street',191)->nullable();
            $table->string('accountnumber',191)->nullable();
            $table->string('bankname',191)->nullable();
            $table->string('statement',191)->nullable();
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
        Schema::dropIfExists('retributions');
    }
}
