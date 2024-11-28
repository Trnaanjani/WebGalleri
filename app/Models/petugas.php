<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class petugas extends Authenticatable
{
    use HasFactory;

    protected $table = 'petugas'; // Menyatakan bahwa model ini menggunakan tabel petugas

    // Menonaktifkan timestamps
    public $timestamps = false;

    // Definisikan fillable properties jika perlu
    protected $fillable = [
        'username',
        'password',
        'created_at', // Anda bisa tambahkan ini jika ingin secara eksplisit
    ];
}

