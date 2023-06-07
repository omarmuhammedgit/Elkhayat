<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePurchasesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('purchases', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('com_code');
            $table->string('Reference_number');
            $table->date('data_purchase');
            $table->string('status_purchase');
            $table->string('address');
            $table->string('sub');
            $table->date('date');
            $table->string('payment_period1');
            $table->string('discount_type');
            $table->string('status_payment');
            $table->string('create_by');
            $table->foreignId('supplier_id')->constrained('suppliers')->cascadeOnDelete();
            // $table->foreignId('product_id')->constrained('products')->cascadeOnDelete();
            $table->decimal('value_discount',22,2);
            $table->decimal('tax_purchase',22,2);
            $table->string('comments_add')->nullable();
            $table->decimal('amount',22,2);
            $table->date('datePayment')->nullable();
            $table->string('payment_method')->nullable();
            $table->string('account')->nullable();
            $table->string('payment_comments')->nullable();
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
        Schema::dropIfExists('purchases');
    }
}
