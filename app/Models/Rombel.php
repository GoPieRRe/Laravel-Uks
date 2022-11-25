<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rombel extends Model
{
    public $table = 'tb_rombel';

    protected $fillable = ['tingkat', 'jurusan','ketua_produktif'];
    use HasFactory;
}
