<?php

namespace Tests\Unit;

use App\Models\Properties;
use Illuminate\Pipeline\Pipeline;
use Illuminate\Support\Str;
//use PHPUnit\Framework\TestCase;
use Tests\TestCase;
use App\SearchFilters\LocationFilter;

class LocationFilterTest extends TestCase
{
    /**
     * test handle function applies the filter
     *
     * @return void
     */
    public function test_handle(): void
    {
        request()->merge(['location' => 'Wales']);
        $pipeline = app(Pipeline::class);
        $builder = $pipeline->send(Properties::query())->through([LocationFilter::class])->thenReturn();

        $sqlWithBindings = Str::replaceArray('?', $builder->getBindings(), $builder->toSql());

        $this->assertStringContainsString('`location_name` like %Wales%', $sqlWithBindings);
    }

    /**
     * ensure we return the correct results
     *
     * @return void
     */
    public function test_handles_query(): void
    {
        request()->merge(['location' => 'Wales']);
        $pipeline = app(Pipeline::class);
        $builder = $pipeline->send(Properties::query())->through([LocationFilter::class])->thenReturn();

        $properties = (array)$builder->get()->pluck('property_name')->toArray();

        $this->assertContains("Beach Cottage", $properties);
    }
}
