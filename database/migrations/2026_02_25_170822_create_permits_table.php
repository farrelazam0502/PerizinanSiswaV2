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
        Schema::create('permits', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->string('type'); // misalkan: sakit, acara_keluarga, dll
            $table->text('reason');
            $table->date('start_date');
            $table->date('end_date');
            $table->string('file_path')->nullable(); // bukti surat/dokumen
            $table->string('status')->default('pending'); // pending, approved, rejected
            $table->text('admin_notes')->nullable(); // pesan atau catatan jika misalnya ditolak
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('permits');
    }
};
