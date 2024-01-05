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
        Schema::create('mokasher_geha_inputs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('mokasher_id')->constrained('mokashers')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('geha_id')->constrained('users')->cascadeOnDelete()->cascadeOnUpdate();
            $table->text('target')->nullable() ;
            $table->string('part_1')->nullable() ;
            $table->string('part_2')->nullable() ;
            $table->string('part_3')->nullable() ;
            $table->string('part_4')->nullable() ;
            $table->text('evidence')->nullable() ;
            $table->text('vivacity')->nullable()  ;
            $table->text('impediments')->nullable()  ;
            $table->tinyInteger('accept')->default(0);
            $table->text('notes')->nullable();
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
        Schema::dropIfExists('mokasher_geha_inputs');
    }
};
