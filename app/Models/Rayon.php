<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rayon extends Model
{
    public $table = 'tb_rayon';

    protected $fillable = ['nama_rayon', 'pembimbing', 'no_hp'];
    use HasFactory;
}
