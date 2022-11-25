<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Obat extends Model
{
    public $table = 'tb_obat';
    protected $fillable = ['nama_obat', 'jenis', 'fungsi', 'stok'];
    
    use HasFactory;
}
