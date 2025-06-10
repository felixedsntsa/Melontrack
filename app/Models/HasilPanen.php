<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HasilPanen extends Model
{
    use HasFactory;

    protected $fillable = [
        'cabang_id',
        'periode_panen',
        'total_panen',
        'keterangan',
    ];

    public function cabang()
    {
        return $this->belongsTo(Cabang::class);
    }

}
