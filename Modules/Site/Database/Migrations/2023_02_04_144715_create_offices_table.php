<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOfficesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('offices', function (Blueprint $table) {
            $table->id();
            $table->string('status');
            $table->string('office_code');
            $table->integer('office_type');
            $table->integer('office_details');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('national_card_series');
            $table->string('national_code');
            $table->string('father_name');
            $table->string('phone');
            $table->string('birth_certificate_number');
            $table->string('birth_certificate_series');
            $table->string('birth_certificate_serial');
            $table->string('birthday');
            $table->string('province');
            $table->string('city');
            $table->text('address');
            $table->string('postal_code');
            $table->string('mobile');
            $table->boolean('has_card_reader');
            $table->string('bank');
            $table->string('account_number');
            $table->string('iban');
            $table->string('tax_code');
            $table->string('description');
            $table->longText('office_permit');
            $table->longText('national_card');
            $table->longText('national_card_back');
            $table->longText('bank_account');
            $table->longText('commitment_letter');
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
        Schema::dropIfExists('offices');
    }
}
