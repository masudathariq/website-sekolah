<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
   public function up()
{
    Schema::create('kelas', function (Blueprint $table) {
        $table->id();
        $table->string('tingkatan'); // contoh: VII, VIII, IX
        $table->string('nama'); // contoh: A, B, C
        $table->string('tahun_ajaran');
        $table->boolean('is_active')->default(false);
        $table->timestamps();
    });
}



    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kelas');
    }
};
