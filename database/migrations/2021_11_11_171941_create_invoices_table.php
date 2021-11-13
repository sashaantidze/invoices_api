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
            $table->string('uid');
            $table->text('street_addreess');
            $table->string('city');
            $table->string('zip_code');
            $table->string('country');
            $table->string('client_name');
            $table->string('client_email');
            $table->string('client_street_addr');
            $table->string('client_city');
            $table->string('client_zip_code');
            $table->string('client_zip_country');
            $table->date('invoice_date');
            $table->date('invoice_payment_due');
            $table->dateTime('invoice_paid')->nullable();
            $table->text('description');
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
