<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('trnx_id');
            $table->string('name');
            $table->string('email')->nullable();
            $table->string('phone');
            $table->tinyInteger('division_id');
            $table->tinyInteger('district_id');
            $table->tinyInteger('upazila_id');
            $table->string('zip_code');
            $table->string('address');
            $table->string('order_note')->nullable();
            $table->string('payment_type');
            $table->double('sub_total', 15, 2);
            $table->integer('discount')->default(0);
            $table->integer('delivery_charge');
            $table->double('total', 15, 2);
            $table->integer('delivery_status')->default(0);
            $table->integer('payment_status')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
