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
        Schema::create('options', function (Blueprint $table) {
            $table->increments('opt_id');
            $table->string('opt_code', 10)->nullable();
            $table->string('opt_name', 50);
            $table->integer('opt_group_id');
            $table->string('opt_sort_order',5)->nullable();
            $table->string('opt_description', 300)->nullable();
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
        Schema::dropIfExists('options');
    }
};
