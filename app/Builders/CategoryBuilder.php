<?php


namespace App\Builders;


use App\Enums\CategoryStatus;
use Illuminate\Database\Eloquent\Builder;

class CategoryBuilder extends Builder
{
    public function active(): CategoryBuilder
    {
        return $this->whereStatus(CategoryStatus::getValue('ACTIVE'));
    }

    public function inactive(): CategoryBuilder
    {
        return $this->whereStatus(CategoryStatus::getValue('INACTIVE'));
    }
}
