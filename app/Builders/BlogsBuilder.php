<?php


namespace App\Builders;

use App\Enums\BlogStatus;
use Illuminate\Database\Eloquent\Builder;

class BlogsBuilder extends Builder
{
    public function active(): BlogsBuilder
    {
        return $this->whereStatus(BlogStatus::getValue('ACTIVE'));
    }

    public function inactive(): BlogsBuilder
    {
        return $this->whereStatus(BlogStatus::getValue('INACTIVE'));
    }
}
