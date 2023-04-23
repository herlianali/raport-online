<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guru extends Model
{

    use HasFactory;
    protected $fillable = [
        'nip','nama','tpt_lahir','tgl_lahir', 'alamat','foto','jenis_kelamin','tlp','mapel_id','status_wali','password'
    ];

    public function mapel()
    {
        return $this->belongsTo(Mapel::class, 'mapel_id', 'id_mapel');
    }
}
