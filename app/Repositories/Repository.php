<?php


namespace App\Repositories;

use Exception;
use App\Contracts\RepositoryInterface;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class Repository implements RepositoryInterface
{
    protected Model $model;

    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    public function find($ids)
    {
        return $this->getModel()->find($ids);
    }

    public function create(array $data): ?Model
    {
        return $this->getModel()->create($data);
    }

    public function update(array $data, string $id): bool
    {
        return $this->getModel()->find($id)->update($data);
    }

    public function delete($ids): bool
    {
        return $this->getModel()->destroy($ids);
    }

    public function with($relations): Builder
    {
        return $this->getModel()->with($relations);
    }

    public function getModel(): Model
    {
        return $this->model;
    }
}
