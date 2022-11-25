<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengunjung extends Model
{
    public $table = 'tb_pengunjung';
    protected $fillable = ['NIS', 'nama', 'rayon','rombel'];
    use HasFactory;
}
