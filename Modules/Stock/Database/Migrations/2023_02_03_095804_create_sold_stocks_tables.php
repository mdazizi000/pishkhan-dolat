<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSoldStocksTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sold_stocks', function (Blueprint $table) {
            $table->id();
            $table->foreignId('stock_holder_id')->constrained('stock_holders')->onDelete('cascade');
            $table->integer('buy_type');
            $table->string('price');
            $table->boolean('status');
            $table->date('due_date');
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
        Schema::dropIfExists('sold_stocks');
    }
}
