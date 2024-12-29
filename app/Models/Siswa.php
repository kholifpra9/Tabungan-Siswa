<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Siswa extends Model
{
    use HasFactory;
    protected $primaryKey = 'nis'; 
    public $incrementing = false; 
    protected $keyType = 'string'; 
    protected $fillable = [
        'nis',
        'kelas_id',
        'nama',
        'tanggal_lahir',
        'alamat',
        'no_hp',
        'nama_ortu',
    ];

    public function kelas()
    {
        return $this->belongsTo(Kelas::class, 'kelas_id', 'id');
    }

    public function tabungan()
    {
        return $this->hasOne(Tabungan::class, 'nis', 'nis');
    }
}
