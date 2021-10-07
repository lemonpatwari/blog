<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = [
        'text',
        'comments_id',
        'user_id',
        'blog_id',
    ];

    public function childrenComments()
    {
        return $this->hasMany(Comment::class)->with('comments');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class,'comments_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
