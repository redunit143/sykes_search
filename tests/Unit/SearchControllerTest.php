<?php

namespace Tests\Unit;

use App\Http\Controllers\SearchController;
use App\Http\Requests\SearchRequest;
use App\Repositories\PropertyRepository;
use Tests\TestCase;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

use App\Models\Properties;

class SearchControllerTest extends TestCase
{
    public function testIndex(): void
    {
        $properties = new Properties();
        $propertyRepository = new PropertyRepository($properties);

        $request = Request::create('/search', 'GET');

        $controller = new SearchController($propertyRepository);
        $response = $controller->index($request);

        $this->assertInstanceOf(View::class, $response);
    }

    public function testPropertyLoookup(): void
    {
        $properties = new Properties();
        $propertyRepository = new PropertyRepository($properties);

        $request = SearchRequest::create('/search', 'POST');

        $controller = new SearchController($propertyRepository);
        $response = $controller->propertyLookUp($request);

        $this->assertInstanceOf(View::class, $response);
    }
}
