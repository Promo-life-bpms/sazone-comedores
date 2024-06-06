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
        Schema::create('quiz', function (Blueprint $table) {
            $table->id();
            $table->string('img');
            $table->string('url');
            $table->foreignId('dining_room_id')->constrained();
            $table->timestamps();
        });

        Schema::create('service', function (Blueprint $table) {
            $table->id();
            $table->string('img');
            $table->foreignId('dining_room_id')->constrained();
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
        Schema::dropIfExists('quiz');
        Schema::dropIfExists('service');

    }
};
