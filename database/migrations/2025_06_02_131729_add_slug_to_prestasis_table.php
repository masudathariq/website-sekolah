<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
{
    if (!Schema::hasColumn('prestasis', 'slug')) {
        Schema::table('prestasis', function (Blueprint $table) {
            $table->string('slug')->nullable()->after('judul');
        });
    }
}

public function down()
{
    Schema::table('prestasis', function (Blueprint $table) {
        $table->dropColumn('slug');
    });
}

};
