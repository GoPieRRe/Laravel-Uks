<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kunjungan extends Model
{
    public $table = 'tb_kunjungan';
    protected $fillable = ['NIS', 'tgl_kunjungan', 'keperluan', 'nama_obat', 'stok'];
    use HasFactory;
}
