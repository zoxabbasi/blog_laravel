<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'user_id',
        'slug',
        'title',
        'description',
        'path_image',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
