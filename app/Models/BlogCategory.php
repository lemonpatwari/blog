<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class BlogCategory extends Pivot
{
    protected $fillable = [
        'blog_id',
        'category_id',
    ];
}
