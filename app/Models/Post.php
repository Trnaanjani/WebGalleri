<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    // Mendefinisikan field yang boleh diisi
    protected $fillable = ['tittle', 'content', 'category_id', 'user_id', 'status'];

    // Relasi POST ke category (one to one)
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    // Relasi post ke user
    public function user()
    {
        return $this->belongsTo(User::class);
    }


    //Relasi ke gallery
    public function galleries()
    {
        return $this->hasMany(Gallery::class);
    }
}
