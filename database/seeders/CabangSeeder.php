<?php

namespace Database\Seeders;

use App\Models\Cabang;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CabangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Cabang::create([
            'nama' => 'Cabang Rambipuji',
            'email' => 'cabangrambipuji@melontrack.id',
            'nama_pekerja' => 'Rendy',
            'no_hp' => '08123456789',
            'lokasi' => 'Rambipuji',
            'password' => Hash::make('cabang123'), // hashed
            'status' => true,
        ]);

        // Tambahan cabang kedua (optional)
        Cabang::create([
            'nama' => 'Cabang Patrang',
            'email' => 'cabangpatrang@melontrack.id',
            'nama_pekerja' => 'Naufal',
            'no_hp' => '08987654321',
            'lokasi' => 'Patrang',
            'password' => Hash::make('cabang123'), // hashed
            'status' => false, // belum aktif
        ]);
    }
}
