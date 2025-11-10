<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('validasi_surats', function (Blueprint $table) {
            $table->id();
            $table->foreignId('surat_pengajuan_id')->constrained('surat_pengajuans')->onDelete('cascade');
            $table->string('kode_qr')->nullable();
            $table->string('barcode')->nullable();
            $table->timestamp('tanggal_validasi')->nullable();
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->string('validated_by')->nullable();
            $table->timestamps();

            $table->index('surat_pengajuan_id');
            $table->index('tanggal_validasi');
        });
    }

    public function down()
    {
        Schema::dropIfExists('validasi_surats');
    }
};
