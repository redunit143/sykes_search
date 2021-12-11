<?php

namespace App\Repositories;

use App\Models\Products;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use App\Http\Requests\ProductRequest;
use Illuminate\Pagination\LengthAwarePaginator;

class ProductsRepository implements ProductsRepositoryInterface
{
    /**
     *
     * @var Products
     */
    private $products;

    public function __construct(Products $products)
    {
        $this->products = $products;
    }

    /**
     * Returns all products
     *
     * @return Collection
     */
    public function all(): Collection
    {
        return $this->products->all();
    }

    /**
     * Returns some products
     *
     * @return LengthAwarePaginator
     */
    public function some(): LengthAwarePaginator
    {
        return $this->products->orderBy('updated_at', 'desc')->paginate(2);
    }

    /**
     *
     * @param int $productId
     * @return Products
     */
    public function findById(int $productId): Products
    {
        return $this->products->where('id', $productId)->firstOrFail();
    }

    /**
     *
     * @param array $request
     * @return bool
     */
    public function addProduct(array $request): bool
    {
        return Products::create([
            'name' => $request['name'],
            'category_id' => $request['category_id'],
            'description' => $request['description'],
            'qty' => $request['qty'],
        ])->save();
    }
}
