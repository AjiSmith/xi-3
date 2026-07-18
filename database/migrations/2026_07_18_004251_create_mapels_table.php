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
        Schema::create('subjects', function (Blueprint $table) {
            $table->id();
            $table->string('kode_mapel')->unique(); // Kode unik mapel, misal: INF-XI
            $table->string('nama_mapel');          // Nama mata pelajaran, misal: Informatika
            $table->integer('kkm')->default(75);   // Standar nilai kelulusan minimum
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('subjects');
    }
};