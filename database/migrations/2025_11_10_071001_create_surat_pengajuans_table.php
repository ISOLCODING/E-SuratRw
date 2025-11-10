<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('surat_pengajuans', function (Blueprint $table) {
            $table->id();
            $table->string('nomor_surat')->unique();
            $table->foreignId('warga_id')->constrained('wargas')->onDelete('cascade');
            $table->foreignId('jenis_surat_id')->constrained('jenis_surats')->onDelete('cascade');
            $table->text('keperluan');
            $table->enum('status', ['pending', 'diproses', 'selesai', 'ditolak'])->default('pending');
            $table->date('tanggal_pengajuan');
            $table->date('tanggal_selesai')->nullable();
            $table->foreignId('operator_id')->nullable()->constrained('users')->onDelete('set null');
            $table->text('catatan')->nullable();
            $table->string('kode_validasi')->unique();
            $table->timestamps();

            $table->index('status');
            $table->index('tanggal_pengajuan');
            $table->index('kode_validasi');
        });
    }

    public function down()
    {
        Schema::dropIfExists('surat_pengajuans');
    }
};
