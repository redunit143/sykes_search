<?php

namespace Tests\Unit;

use App\Models\Properties;
use Illuminate\Pipeline\Pipeline;
use Illuminate\Support\Str;
//use PHPUnit\Framework\TestCase;
use Tests\TestCase;
use App\SearchFilters\NearBeachFilter;

class NearBeachFilterTest extends TestCase
{
    /**
     * test handle function applies the filter
     *
     * @return void
     */
    public function test_handle(): void
    {
        request()->merge(['near_beach' => '1']);
        $pipeline = app(Pipeline::class);
        $builder = $pipeline->send(Properties::query())->through([NearBeachFilter::class])->thenReturn();

        $sqlWithBindings = Str::replaceArray('?', $builder->getBindings(), $builder->toSql());

        $this->assertStringContainsString('`near_beach` = 1', $sqlWithBindings);
    }

    /**
     * ensure we return the correct results
     *
     * @return void
     */
    public function test_handles_query(): void
    {
        request()->merge(['near_beach' => '1']);
        $pipeline = app(Pipeline::class);
        $builder = $pipeline->send(Properties::query())->through([NearBeachFilter::class])->thenReturn();

        $properties = (array)$builder->get()->pluck('near_beach')->toArray();

        $this->assertNotContains(0, $properties);
    }
}
