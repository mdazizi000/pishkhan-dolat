<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('stock_holder_id')->constrained('stock_holders')->onDelete('cascade');
            $table->foreignId('sold_stock_id')->constrained('sold_stocks')->onDelete('cascade');
            $table->string('payment_id')->nullable();
            $table->string('transaction_id')->nullable();
            $table->string('ref_id')->nullable();
            $table->string('amount');
            $table->string('status');
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
        Schema::dropIfExists('transactions');
    }
}
