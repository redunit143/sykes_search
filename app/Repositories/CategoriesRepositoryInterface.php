<?php

namespace App\Repositories;

use App\Models\Categories;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;

interface CategoriesRepositoryInterface
{
    public function all(): Collection;
    public function findById(int $categoryId): Categories;
}
