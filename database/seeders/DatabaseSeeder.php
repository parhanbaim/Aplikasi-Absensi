<?php

namespace Database\Seeders;

use App\Models\Absensi;
use App\Models\Siswa;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $siswa = Siswa::create([
            'name' => 'Budi Santoso',
            'kelas' => 'X IPA 1',
        ]);

        Absensi::create([
            'siswa_id' => $siswa->id,
            'tanggal' => now()->toDateString(),
            'status' => 'hadir',
            'keterangan' => null,
        ]);
    }
}
