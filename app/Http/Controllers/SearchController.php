<?php

namespace App\Http\Controllers;

use App\Http\Requests\IndexSearchRequest;
use App\Http\Requests\SearchRequest;
use App\Repositories\PropertyRepositoryInterface;
use Illuminate\Contracts\View\View;

class SearchController extends Controller
{
    private int $searchItemsPerPage = 4;
    /**
     *
     * @var \App\Repositories\PropertyRepository
     */
    private PropertyRepositoryInterface $propertyRepository;

    public function __construct(PropertyRepositoryInterface $propertyRepository)
    {
        $this->propertyRepository = $propertyRepository;
    }

    /**
     *
     * @param IndexSearchRequest $request
     * @return View
     */
    public function index(): View
    {
            return view('property.lookup');
    }

    /**
     *
     * @param SearchRequest $request
     * @return View
     */
    public function propertyLookUp(SearchRequest $request): View
    {
        $builder = $this->propertyRepository->searchProperty();
        $properties = $builder->paginate($this->searchItemsPerPage);
        return view('property.lookup', compact('properties'));
    }
}
