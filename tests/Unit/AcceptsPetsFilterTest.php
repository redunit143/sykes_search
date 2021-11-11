<?php

namespace Tests\Unit;

use App\Models\Properties;
use Illuminate\Pipeline\Pipeline;
use Illuminate\Support\Str;
//use PHPUnit\Framework\TestCase;
use Tests\TestCase;
use App\SearchFilters\AcceptsPetsFilter;

class AcceptsPetsFilterTest extends TestCase
{
    /**
     * test handle function applies the filter
     *
     * @return void
     */
    public function test_handle(): void
    {
        request()->merge(['accepts_pets' => '1']);
        $pipeline = app(Pipeline::class);
        $builder = $pipeline->send(Properties::query())->through([AcceptsPetsFilter::class])->thenReturn();

        $sqlWithBindings = Str::replaceArray('?', $builder->getBindings(), $builder->toSql());

        $this->assertStringContainsString('`accepts_pets` = 1', $sqlWithBindings);
    }

    /**
     * ensure we return the correct results
     *
     * @return void
     */
    public function test_handles_query(): void
    {
        request()->merge(['accepts_pets' => '1']);
        $pipeline = app(Pipeline::class);
        $builder = $pipeline->send(Properties::query())->through([AcceptsPetsFilter::class])->thenReturn();

        $properties = (array)$builder->get()->pluck('accepts_pets')->toArray();

        $this->assertNotContains(0, $properties);
    }
}
