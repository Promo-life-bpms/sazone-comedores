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
        Schema::create('coupons', function (Blueprint $table) {
            $table->id();
            $table->text('name');
            $table->text('img');
            $table->unsignedTinyInteger('discount');
            $table->date('start');
            $table->date('end');
            $table->tinyInteger('monday')->default(0);
            $table->tinyInteger('tuesday')->default(0);
            $table->tinyInteger('wednesday')->default(0);
            $table->tinyInteger('thursday')->default(0);
            $table->tinyInteger('friday')->default(0);
            $table->tinyInteger('saturday')->default(0);
            $table->tinyInteger('sunday')->default(0);
            $table->tinyInteger('ilimited')->default(0);
            $table->tinyInteger('only_one_use')->default(0);
            $table->tinyInteger('one_use_peer_day')->default(0);
            $table->text('other')->nullable();
            $table->foreignId('dining_room_id')->constrained('dining_rooms');
            $table->timestamps();
        });


        Schema::create('user_has_coupons', function (Blueprint $table) {
            $table->id();
            $table->foreignId('coupon_id')->constrained('coupons');
            $table->foreignId('user_id')->constrained('users');
            $table->tinyText('status')->default('no used');
            $table->timestamps();
        });


        Schema::create('coupon_used', function (Blueprint $table) {
            $table->id();
            $table->foreignId('coupon_id')->constrained('coupons');
            $table->foreignId('user_id')->constrained('users');
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
        Schema::dropIfExists('coupon_used');
        Schema::dropIfExists('user_has_coupons');
        Schema::dropIfExists('coupons');
    }
};
