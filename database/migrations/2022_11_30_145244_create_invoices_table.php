<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->increments('inv_id');
            $table->string('inv_number', 15);
            $table->string('inv_to', 50);
            $table->string('inv_contact_number', 20);
            $table->dateTime('inv_date');
            $table->integer('inv_currency');
            $table->integer('inv_status');
            $table->integer('inv_payment_method');
            $table->string('inv_delivery_address', 500);
            $table->integer('created_by');
            $table->dateTime('created_at');
            $table->integer('modified_by')->nullable()->default(0);
            $table->dateTime('updated_at');
            $table->dateTime('deleted_at')->nullable();
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
};
