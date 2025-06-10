<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HasilPenjualan extends Model
{
    use HasFactory;

    protected $fillable = [
        'tahun',
        'bulan',
        'jumlah'
    ];
}
