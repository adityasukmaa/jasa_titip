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
            $table->uuid('id')->primary();
            $table->string('customer_name');
            $table->string('customer_wa');
            $table->string('customer_address');
            $table->decimal('lat', 18, 15);
            $table->decimal('long', 18, 15);
            $table->integer('price');
            $table->integer('app_fee');
            $table->integer('courir_fee');
            $table->foreignId('cabang_id') 
                  ->constrained('cabangs', 'id', 'order_cabang')
                  ->restrictOnUpdate()
                  ->cascadeOnDelete();
            $table->foreignId('courir_id')
                  ->nullable()
                  ->constrained('kurirs', 'id', 'courir_order')
                  ->restrictOnUpdate()
                  ->cascadeOnDelete();
            $table->enum('status', ['created', 'processed', 'done']);
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
