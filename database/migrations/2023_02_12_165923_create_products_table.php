<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name_product');
            $table->bigInteger('com_code');
            $table->string('no_product');
            $table->string('sub_site');
            $table->foreignId('trade_mark_id')->constrained()->cascadeOnDelete();
            $table->foreignId('section_id')->constrained()->cascadeOnDelete();
            $table->string('sub_section')->nullable();
            $table->foreignId('unit_id')->constrained()->cascadeOnDelete();
            $table->string('sub_unti')->nullable();
            $table->string('quantity_alert')->nullable();
            $table->string('image_product')->nullable();
            $table->decimal('price_purchas_include_tax')->nullable();
            $table->decimal('price_purches_doesnot_include_tax')->nullable();
            $table->decimal('price_sale_include_tax')->nullable();
            $table->decimal('price_sale_doesnot_include_tax')->nullable();
            $table->string('rale')->nullable();
            $table->decimal('total')->nullable();
            $table->decimal('total_opening_balance')->nullable();
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
        Schema::dropIfExists('products');
    }
}
