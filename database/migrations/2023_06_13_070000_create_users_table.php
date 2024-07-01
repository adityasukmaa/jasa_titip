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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('username')->unique();
            $table->string('full_name');
            $table->string('wa_number')->unique();
            $table->string('password');
            $table->string('img_name')->nullable();
            $table->string('note')->nullable();
            $table->unsignedInteger('saldo')->default(0);
            $table->foreignId('cabang_id') 
                  ->nullable()
                  ->constrained('cabangs', 'id', 'admin_cabang')
                  ->cascadeOnDelete()
                  ->cascadeOnUpdate();
            $table->enum('role', ['superadmin', 'admin']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
