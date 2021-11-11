<?php

namespace Tests\Unit;

use App\Models\Properties;
use Illuminate\Pipeline\Pipeline;
use Illuminate\Support\Str;
//use PHPUnit\Framework\TestCase;
use Tests\TestCase;
use App\SearchFilters\MinimumBedsFilter;

class MinimumBedsFilterTest extends TestCase
{
    /**
     * test handle function works
     *
     * @return void
     */
    public function test_handle(): void
    {
        request()->merge(['beds' => '1']);
        $pipeline = app(Pipeline::class);
        $builder = $pipeline->send(Properties::query())->through([MinimumBedsFilter::class])->thenReturn();

        $sqlWithBindings = Str::replaceArray('?', $builder->getBindings(), $builder->toSql());

        $this->assertStringContainsString('`beds` >= 1', $sqlWithBindings);
    }

    /**
     * ensure we return the correct results
     *
     * @return void
     */
    public function test_handles_query(): void
    {
        request()->merge(['beds' => '3']);
        $pipeline = app(Pipeline::class);
        $builder = $pipeline->send(Properties::query())->through([MinimumBedsFilter::class])->thenReturn();

        $properties = (array)$builder->get()->pluck('beds')->toArray();

        foreach ($properties as $sleeps) {
            $this->assertGreaterThanOrEqual(3, $sleeps);
        }
    }
}
