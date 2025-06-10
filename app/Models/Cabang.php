<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Cabang extends Authenticatable
{
    use HasFactory, Notifiable;
    protected $fillable = [
        'nama',
        'email',
        'nama_pekerja',
        'no_hp',
        'lokasi',
        'password',
        'status'
    ];
}
