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
        Schema::create('categories', function (Blueprint $table) {
            //$table->string('id')->default('Cid-001')->primary();
            //$table->string('category_id')->default('cid001')->unique();
            $table->id();
            $table->string('category_name');
            $table->string('status');
            $table->string('created_by');
            //$table->date('created_date')
            $table->timestamp('created_time')->useCurrent();
            //$table->timestamp('updated_time')->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('categories');
    }
};
