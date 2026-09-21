<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Siswa extends Model
{
    /** @use HasFactory<UserFactory> */
    use HasFactory;


    protected $fillable = [
        'name',
        'kelas',
        
    ];
    public function absensi()
    {
        return $this->hasMany(Absensi::class);
    }
}
