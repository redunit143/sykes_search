<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Repositories\ProductsRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;
use App\Http\Requests\ProductRequest;
use App\Repositories\CategoriesRepositoryInterface;

class ProductsController extends Controller
{

    private ProductsRepositoryInterface $productRepo;
    private CategoriesRepositoryInterface $categoryRepo;

    public function __construct(
        ProductsRepositoryInterface $productRepo,
        CategoriesRepositoryInterface $categoryRepo
    ) {
        $this->productRepo = $productRepo;
        $this->categoryRepo = $categoryRepo;
    }

    /**
     *
     * @return View
     */
    public function index(): View
    {
        $categories = $this->categoryRepo->all();
        $products = $this->productRepo->some();
        return view('main', [
            'control' => [
                'action' => 'product',
                'state' => '',
                ],
            'products' => $products,
            'categories' => $categories,
        ]);
    }

    /**
     *
     * @return View | RedirectResponse
     */
    public function store(ProductRequest $request)
    {
        $success = $this->productRepo->addProduct($request->all());
        if ($success) {
            return redirect()->action([self::class, 'index']);
        }

        // show the form again
        $categories = $this->categoryRepo->all();
        return view('main', [
            'control' => [
                'action' => 'product',
                'state' => 'add.error',
            ],
            'feedback' => 'Error: unable to add product',
            'categories' => $categories,
        ]);
    }
}
