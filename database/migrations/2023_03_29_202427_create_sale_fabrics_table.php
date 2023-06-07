<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSaleFabricsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sale_fabrics', function (Blueprint $table) {
            $table->id();
            $table->integer('no_invoics');
            $table->date('date')->nullable();
            $table->string('name');
            $table->string('color');
            $table->string('quantity_available');
            $table->string('type_fabrics')->nullable();
            $table->string('quantity_sold');
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
        Schema::dropIfExists('sale_fabrics');
    }
}
