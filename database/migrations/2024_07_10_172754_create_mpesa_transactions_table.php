<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMpesaTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mpesa_transactions', function (Blueprint $table) {
            $table->id();
            $table->string('TransactionType');
            $table->string('TransID');
            $table->timestamp('TransTime');
            $table->decimal('TransAmount', 10, 2);
            $table->string('BusinessShortCode');
            $table->string('BillRefNumber')->nullable();
            $table->string('InvoiceNumber')->nullable();
            $table->decimal('OrgAccountBalance', 15, 2)->nullable();
            $table->string('ThirdPartyTransID')->nullable();
            $table->string('MSISDN');
            $table->string('FirstName');
            $table->string('MiddleName')->nullable();
            $table->string('LastName');
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
        Schema::dropIfExists('mpesa_transactions');
    }
}
