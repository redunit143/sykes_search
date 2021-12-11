<?php

namespace App\Repositories;

use App\Models\Products;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;

interface ProductsRepositoryInterface
{
    public function all(): Collection;
    public function findById(int $productId): Products;
}
