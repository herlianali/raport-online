<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kd extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_kd','nis_id','eks_id','smtr','nilai_kd',
    ];

    public function siswa()
    {
        return $this->belongsTo(Siswa::class, 'nis_id', 'nis');
    }

    public function kelas()
    {
        return $this->belongsTo(Kelas::class, 'kelas_id', 'id_kelas');
    }
}
