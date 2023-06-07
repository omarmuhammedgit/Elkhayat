<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSizesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sizes', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('com_code');

            $table->string('height')->nullable();
            $table->string('shoulder')->nullable();
            $table->string('shoulder_leight')->nullable();
            $table->string('brest')->nullable();
            $table->string('expand_brest')->nullable();
            $table->string('neck')->nullable();
            $table->string('expand_hand')->nullable();
            $table->string('down_hand')->nullable();
            $table->string('cbk_leight')->nullable();
            $table->string('cbk_width')->nullable();
            $table->string('pocket_leight')->nullable();
            $table->string('pocket_expand')->nullable();
            $table->string('down_expand')->nullable();
            $table->string('down_desist')->nullable();
            $table->string('image_neck')->nullable();
            $table->string('image_cbk')->nullable();
            $table->string('image_brest_pocket')->nullable();
            $table->string('image_pocket')->nullable();
            $table->string('image_algizour')->nullable();
            $table->foreignId('customer_id')->constrained()->cascadeOnDelete();
            $table->string('seamoer_id')->nullable();
            $table->string('retribution_id')->nullable();
            $table->string('design')->nullable();
            $table->string('fabric')->nullable();
            $table->string('color_fabrice')->nullable();
            $table->string('section')->nullable();
            $table->string('trade_mark')->nullable();
            $table->string('size_neck')->nullable();
            $table->string('size_cbk')->nullable();
            $table->string('size_brest_pocket')->nullable();
            $table->string('size_pocket')->nullable();
            $table->string('size_algizour')->nullable();
            $table->string('number_dresses');
            $table->string('detail_duration');
            $table->date('date');
            $table->foreignId('invoice_id')->constrained()->cascadeOnDelete();
            $table->string('seamtress')->nullable();
            $table->decimal('price_include_tax');
            $table->decimal('tex_parcent')->nullable();
            $table->decimal('value_tax');
            $table->decimal('price_doesnot_include_tax');
            $table->decimal('discount')->nullable();
            $table->decimal('afterdiscount')->nullable();
            $table->decimal('receivedamount')->nullable();
            $table->decimal('remainingamount')->nullable();
            $table->string('payment')->nullable();
            $table->string('notes',500)->nullable();
            $table->date('receved_data')->nullable();
            $table->string('status')->nullable();
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
        Schema::dropIfExists('sizes');
    }
}
