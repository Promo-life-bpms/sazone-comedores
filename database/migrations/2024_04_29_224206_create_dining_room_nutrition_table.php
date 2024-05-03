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
        Schema::create('dining_room_nutrition', function (Blueprint $table) {
            $table->id();
            $table->foreignId('dining_room_id')->constrained();
            $table->foreignId('nutrition_id')->constrained('nutritions');
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
        Schema::dropIfExists('dining_room_nutrition');
    }
};
