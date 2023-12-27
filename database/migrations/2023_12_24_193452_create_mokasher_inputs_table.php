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
            $table->bigInteger('year_one')->nullable();
            $table->bigInteger('year_two')->nullable();
            $table->bigInteger('year_three')->nullable();
            $table->bigInteger('year_four')->nullable();
            $table->bigInteger('year_five')->nullable();
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
