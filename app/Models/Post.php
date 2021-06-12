<?php

namespace App\Models;

use App\Models\Comment;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory;
    protected $fillable = [
        'post_title',
        'post_description'
    ];

    //comment relationship
    public function comment(){
        return $this->hasMany(Comment::class);
    }
}
