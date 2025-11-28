<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    public $table = 'mahasiswas';
    protected $fillable = ['nama', 'nim', 'fakultas'];
    
}
