<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    //mendefinisikan field yang boleh diisi
    protected $fillable = ['tittle'];

    //Relasi CATEGORY ke post
    public function posts()
    {
        return $this->hasMany(post::class);
    }
}