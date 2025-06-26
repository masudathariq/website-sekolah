<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('jadwal_pelajaran', function (Blueprint $table) {
            $table->foreignId('guru_id')->after('mata_pelajaran')->constrained('gurus')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::table('jadwal_pelajaran', function (Blueprint $table) {
            $table->dropForeign(['guru_id']);
            $table->dropColumn('guru_id');
        });
    }
};
