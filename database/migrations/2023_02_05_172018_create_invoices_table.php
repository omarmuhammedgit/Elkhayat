<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->id();
            $table->string('invoice_number')->unique();
            $table->string('status')->nullable();
            $table->bigInteger('com_code');
            $table->date('date')->nullable();
            $table->decimal('price_include_tax');
            $table->decimal('tex_parcent')->nullable();
            $table->decimal('value_tax');
            $table->string('number_dresses');
            $table->string('detail_duration');
            $table->date('receved_data')->nullable();
            $table->decimal('price_doesnot_include_tax');
            $table->decimal('discount')->nullable();
            $table->decimal('afterdiscount')->nullable();
            $table->decimal('receivedamount')->nullable();
            $table->decimal('remainingamount')->nullable();
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
        Schema::dropIfExists('invoices');
    }
}
