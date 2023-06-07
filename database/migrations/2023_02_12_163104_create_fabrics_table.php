<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFabricsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fabrics', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('code');
            $table->string('color');
            $table->string('mark');
            $table->string('energies');
            $table->string('yards');
            $table->string('meters');
            $table->decimal('total',10,2);
            $table->string('value_tax',10,2);
            $table->string('balance_yard')->nullable();
            $table->string('rate_tax')->nullable();
            $table->decimal('receivedamount',10,2)->nullable();
            $table->decimal('remainingamount',10,2)->nullable();
            $table->foreignId('supplier_id')->nullable()->constrained('suppliers','id')->cascadeOnDelete();
            $table->string('invoices_purchases_id')->nullable();
            $table->date('date')->nullable();
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
        Schema::dropIfExists('fabrics');
    }
}
