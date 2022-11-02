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
        Schema::create('medicines', function (Blueprint $table) {
            $table->id();
            $table->string('commercial_name');
            $table->string('company_name')->default('');
            $table->string('medical_name');
            $table->string('category');
            $table->string('type');
            $table->string('usage');
            $table->string('created_by');
            //$table->foreign('type_id')->references('id')->on('medicine_types')->onUpdate('cascade')->nullOnDelete();
            $table->timestamp('created_time')->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('medicines');
    }
};
