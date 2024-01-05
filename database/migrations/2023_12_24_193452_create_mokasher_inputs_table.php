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
        Schema::create('mokasher_inputs', function (Blueprint $table) {
            $table->id();
            $table->enum('type' , ['parcent' ,'num']);
            $table->bigInteger('target')->nullable();
            $table->enum('equation' , ['total' ,'modal']);
            $table->string('2023')->nullable();
            $table->string('2024')->nullable();
            $table->string('2025')->nullable();
            $table->string('2026')->nullable();
            $table->string('2027')->nullable();
            $table->string('2028')->nullable();
            $table->string('2029')->nullable();
            $table->string('users')->nullable() ;
            $table->foreignId('mokasher_id')->constrained('mokashers')->cascadeOnDelete()->cascadeOnUpdate();
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
        Schema::dropIfExists('mokasher_inputs');
    }
};
