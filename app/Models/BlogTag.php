<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class BlogTag extends Pivot
{
    protected $fillable = [
        'blog_id',
        'tag_id',
    ];
}
