<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    protected $fillable = [
        'tabungan_id',
        'user_id',
        'tanggal',
        'nominal',
        'saldo',
        'kategori',
        'keterangan',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function tabungan()
    {
        return $this->belongsTo(Tabungan::class, 'tabungan_id', 'id');
    }

    public $timestamps = false;
}
