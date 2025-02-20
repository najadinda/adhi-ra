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
            $table->foreignId('user_id')->nullable()->constrained('users')->onDelete('set null');
            $table->string('name');
            $table->string('phone');
            $table->text('address');
            $table->unsignedInteger('total_amount');
            $table->string('payment_method');
            $table->enum('payment_status', ['menunggu', 'dibayar', 'dikembalikan'])->default('menunggu');
            $table->dateTime('order_date')->default(now());
            $table->enum('status', ['diproses', 'diantar', 'diterima', 'dibatalkan'])->default('diproses');
            $table->softDeletes();
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
