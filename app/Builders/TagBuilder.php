<?php


namespace App\Builders;


use App\Enums\CategoryStatus;
use App\Enums\TagStatus;
use Illuminate\Database\Eloquent\Builder;

class TagBuilder extends Builder
{
    public function active(): TagBuilder
    {
        return $this->whereStatus(TagStatus::getValue('ACTIVE'));
    }

    public function inactive(): TagBuilder
    {
        return $this->whereStatus(TagStatus::getValue('INACTIVE'));
    }
}
