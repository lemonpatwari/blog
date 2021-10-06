<?php

namespace App\Models;

use App\Enums\CategoryStatus;
use App\Builders\CategoryBuilder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'status',
        'slug'
    ];

    protected $casts = [
        'status' => CategoryStatus::class
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
