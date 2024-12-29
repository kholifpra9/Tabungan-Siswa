<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tabungan extends Model
{
    protected $fillable = [
        'nis',
        'saldo',
    ];

    public function siswa()
    {
        return $this->belongsTo(Siswa::class, 'nis', 'nis');
    }

    public function transaksi()
    {
        return $this->hasMany(Transaksi::class, 'tabungan_id', 'id');
    }
}
