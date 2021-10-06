<?php


namespace App\Contracts;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

interface RepositoryInterface
{
    /**
     * @param int|array $ids
     * @return Collection|Model|null
     */
    public function find($ids);

    /**
     * @param array $data
     * @return Model|null
     */
    public function create(array $data):?Model;

    /**
     * @param array $data
     * @param int $id
     * @return bool
     */
    public function update(array $data, string $id):bool;

    /**
     * @param int|array $ids
     * @return bool
     */
    public function delete($ids):bool;

    /**
     * @param string|array $relations
     * @return Builder
     */
    public function with($relations):Builder;
}
