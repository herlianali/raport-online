<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ekstrakulikuler extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_ekstra','nis_id','eks_id','smtr','nilai_ekstra',
    ];

    public function siswa()
    {
        return $this->belongsTo(Siswa::class, 'nis_id', 'nis');
    }

    public function kelas()
    {
        return $this->belongsTo(Kelas::class, 'kelas_id', 'id_kelas');
    }

    public function ekstra()
    {
        return $this->belongsTo(Ekstra::class, 'eks_id', 'id_eks');
    }
}
