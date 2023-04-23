<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    use HasFactory;
    public $table = "kelas";
    protected $fillable = [
        'id_kelas','nama_kelas',
    ];

    // public function siswas()
    // {
    //     return $this->hasMany(Siswa::class);
    // }
}
