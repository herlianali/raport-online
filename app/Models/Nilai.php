<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nilai extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_nilai','nis_id','kelas_id','eks_id','mapel_id','smtr','nilai_smtr',
    ];

    public function siswa()
    {
        return $this->belongsTo(Siswa::class, 'nis_id', 'nis');
    }

    public function kelas()
    {
        return $this->belongsTo(Kelas::class, 'kelas_id', 'id_kelas');
    }

    public function mapel()
    {
        return $this->belongsTo(Mapel::class, 'mapel_id', 'id_mapel');
    }
}
