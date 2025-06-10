<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Laporan extends Model
{
    use HasFactory;

    protected $fillable = [
        'cabang_id', 'tanggal', 'deskripsi', 'dokumentasi', 'feedback'
    ];

    protected $casts = [
        'dokumentasi' => 'array',
    ];

    public function cabang()
    {
        return $this->belongsTo(Cabang::class);
    }
}
