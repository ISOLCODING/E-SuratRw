<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('jenis_surats', function (Blueprint $table) {
            $table->id();
            $table->string('nama_surat');
            $table->string('kode_surat')->unique();
            $table->string('template_path');
            $table->boolean('is_active')->default(true);
            $table->text('deskripsi')->nullable();
            $table->integer('lama_proses')->default(1)->comment('Dalam hari');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('jenis_surats');
    }
};
