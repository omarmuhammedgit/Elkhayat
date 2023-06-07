<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('name',150);
            $table->bigInteger('com_code');
            $table->string('commercial_record',20)->unique();
            $table->string('phone');
            $table->string('email');
            $table->string('city',250)->nullable();
            $table->string('country')->nullable();
            $table->string('postal_code')->nullable();
            $table->string('image')->nullable();
            $table->string('created_by');
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
        Schema::dropIfExists('settings');
    }
}
