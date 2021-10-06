<?php

namespace App\Models;

use App\Builders\CategoryBuilder;
use App\Enums\TagStatus;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'status',
        'slug'
    ];

    protected $casts = [
        'status' => TagStatus::class
    ];

    public function blogs()
    {
        return $this->belongsToMany(Blog::class)->withTimestamps();
    }

    public function newEloquentBuilder($query): CategoryBuilder
    {
        return new CategoryBuilder($query);
    }
}
