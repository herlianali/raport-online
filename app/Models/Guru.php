<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guru extends Model
{

    use HasFactory;
    protected $fillable = [
        'nip','nama','tpt_lahir','tgl_lahir', 'alamat','foto','jenis_kelamin','tlp','status_wali','password'
    ];
}
