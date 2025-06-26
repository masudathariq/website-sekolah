<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
{
    Schema::table('prestasis', function (Blueprint $table) {
        $table->string('gambar')->nullable()->after('isi'); // nullable supaya gak wajib
    });
}

public function down()
{
    Schema::table('prestasis', function (Blueprint $table) {
        $table->dropColumn('gambar');
    });
}

};
