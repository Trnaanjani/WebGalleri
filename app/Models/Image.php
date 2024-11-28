<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $fillable = [
        'gallery_id',
        'file',
        'tittle'
    ];

    // Pastikan nama tabel sesuai
    protected $table = 'images'; // atau sesuaikan dengan nama tabel Anda

    public function gallery()
    {
        return $this->belongsTo(Gallery::class);
    }
}   