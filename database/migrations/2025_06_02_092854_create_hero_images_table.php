<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
{
    Schema::create('hero_images', function (Blueprint $table) {
        $table->id();
        $table->string('image_url');  // path foto
        $table->integer('order')->default(0);  // urutan tampil
        $table->boolean('active')->default(true);
        $table->timestamps();
    });
}

public function down()
{
    Schema::dropIfExists('hero_images');
}

};
