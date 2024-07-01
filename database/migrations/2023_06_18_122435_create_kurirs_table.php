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
        Schema::create('kurirs', function (Blueprint $table) {
            $table->id();
            $table->string('full_name');
            $table->string('address_ktp');
            $table->string('address_now');
            $table->string('profile_img');
            $table->string('ktp_img');
            $table->string('wa_number');
            $table->unsignedInteger('saldo')->default(0);
            $table->foreignId('cabang_id')
                  ->constrained('cabangs', 'id', 'kurir_cabang')
                  ->cascadeOnDelete()
                  ->cascadeOnUpdate();
            $table->string('password');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kurirs');
    }
};
