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
        Schema::create('users', function (Blueprint $table) {
            //$table->string('id')->default('Uid-001')->unique();
            $table->id();
            $table->string('username')->unique();
            $table->string('password');
            $table->string('name')->nullable();
            $table->string('address')->nullable();
            $table->enum('role',['Admin','Employee','Stock Manager', 'Head Pharmacist']);
            $table->string('mobile');
            $table->string('nicfile')->nullable();
            $table->string('license')->nullable();
            $table->string('nic'); 
            $table->string('gender');
            //$table->string('email')->unique();
            //$table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
};
