<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('jadwal_pelajaran', function (Blueprint $table) {
        $table->id();
        $table->foreignId('kelas_id')->constrained('kelas')->onDelete('cascade');
        $table->string('hari'); // Senin, Selasa, dll
        $table->time('jam_mulai');
        $table->time('jam_selesai');
        $table->string('mata_pelajaran');
        $table->string('guru');
        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jadwal_pelajarans');
    }
};
