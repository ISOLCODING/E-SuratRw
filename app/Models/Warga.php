<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Warga extends Model
{
    //
    protected $table = 'warga';

    protected $fillable = [
        'user_id',
        'nik',
        'tanggal_lahir',
        'jenis_kelamin',
        'pekerjaan',
        'status_perkawinan',
        'kewarganegaraan',
        'agama',
    ];
        protected $casts = [
        'tanggal_lahir' => 'date',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
      public function suratPengajuan()
    {
        return $this->hasMany(SuratPengajuan::class);
    }

    public function getUsiaAttribute()
    {
        return $this->tanggal_lahir->diffInYears(now());
    }

    public function getNamaLengkapAttribute()
    {
        return $this->user->nama_lengkap;
    }

    public function getEmailAttribute()
    {
        return $this->user->email;
    }

    public function getTeleponAttribute()
    {
        return $this->user->telepon;
    }
}
