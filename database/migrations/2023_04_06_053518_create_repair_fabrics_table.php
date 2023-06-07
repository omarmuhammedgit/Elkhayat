<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRepairFabricsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('repair_fabrics', function (Blueprint $table) {
            $table->id();

            $table->string('no_invoics');
            $table->date('date');
            $table->string('name');
            $table->string('phone');
            $table->string('code');
            $table->decimal('value',10,2);
            $table->integer('number_repairs');
            $table->text('repair');
            $table->date('delivery_date');
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
        Schema::dropIfExists('repair_fabrics');
    }
}
