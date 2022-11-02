<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB; 
return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stocks', function (Blueprint $table) {
            
            $table->id();
            $table->unsignedBigInteger('medicine_id');
            $table->foreign('medicine_id')->references('id')->on('medicines')->onUpdate('cascade');
            //$table->string('commercial_name');
            $table->integer('dosage');
            $table->string('unit');
            $table->float('unitprice');
            $table->float('unitcost');
            $table->float('price');
            $table->float('cost');
            $table->integer('quantity');
            $table->date('expiry_date');
            $table->string('supplier_name');
            $table->string('created_by');
            $table->string('batch_no');
            $table->integer('box_size');
            $table->integer('noboxes');
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
        Schema::dropIfExists('stocks');
    }
};
