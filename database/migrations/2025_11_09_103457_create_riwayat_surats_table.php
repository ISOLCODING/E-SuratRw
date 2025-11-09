<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('riwayat_surats', function (Blueprint $table) {
            $table->id();
            $table->foreignId('surat_pengajuan_id')->constrained()->onDelete('cascade');
            $table->string('status_sebelum')->nullable();
            $table->string('status_sesudah');
            $table->text('catatan')->nullable();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->timestamps();

            $table->index('surat_pengajuan_id');
            $table->index('created_at');
        });
    }

    public function down()
    {
        Schema::dropIfExists('riwayat_surats');
    }
};
