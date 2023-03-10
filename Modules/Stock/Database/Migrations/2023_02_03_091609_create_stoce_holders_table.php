<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStoceHoldersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stock_holders', function (Blueprint $table) {
            $table->id();
            $table->string('office_code')->nullable();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('national_code');
            $table->string('phone');
            $table->string('gender');
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
        Schema::dropIfExists('stoce_holders');
    }
}
