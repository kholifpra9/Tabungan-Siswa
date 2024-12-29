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
        Schema::create('siswas', function (Blueprint $table) {
            $table->char('nis', 10)->unique()->primary();
            $table->foreignId('kelas_id')->constrained()->onDelete('cascade')->onUpdate('cascade');
            $table->string('nama');
            $table->date('tanggal_lahir');
            $table->text('alamat');
            $table->char('no_hp', 14);
            $table->string('nama_ortu');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('siswas');
    }
};
