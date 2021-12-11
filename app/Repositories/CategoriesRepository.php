<?php

namespace App\Repositories;

use App\Models\Categories;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;

class CategoriesRepository implements CategoriesRepositoryInterface
{
    /**
     *
     * @var Categories
     */
    private $categories;

    public function __construct(Categories $categories)
    {
        $this->categories = $categories;
    }

    /**
     * Returns all products
     *
     * @return Collection
     */
    public function all(): Collection
    {
        return new Collection([
            ['name' => 'category 1', 'id' => 1],
            ['name' => 'category 2', 'id' => 2],
            ['name' => 'category 3', 'id' => 3],
        ]);
        return $this->categories->all();
    }

    /**
     *
     * @param int $categoryId
     * @return Categories
     */
    public function findById(int $categoryId): Categories
    {
        return $this->categories->where('id', $categoryId)->firstOrFail();
    }
}
