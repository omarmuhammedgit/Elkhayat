<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSellDressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sell_dresses', function (Blueprint $table) {
            $table->id();
            $table->integer('no_invoics');
            $table->date('date')->nullable();
            $table->string('dressExpand');
            $table->string('dresslength');
            $table->string('count');
            $table->decimal('value',10,2);
            $table->string('payment')->nullable();
            $table->bigInteger('com_code');
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
        Schema::dropIfExists('sell_dresses');
    }
}
