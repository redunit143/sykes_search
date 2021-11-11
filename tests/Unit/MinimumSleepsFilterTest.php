<?php

namespace Tests\Unit;

use App\Models\Properties;
use Illuminate\Pipeline\Pipeline;
use Illuminate\Support\Str;
//use PHPUnit\Framework\TestCase;
use Tests\TestCase;
use App\SearchFilters\MinimumSleepsFilter;

class MinimumSleepsFilterTest extends TestCase
{
    /**
     * test handle function works
     *
     * @return void
     */
    public function test_handle(): void
    {
        request()->merge(['sleeps' => '1']);
        $pipeline = app(Pipeline::class);
        $builder = $pipeline->send(Properties::query())->through([MinimumSleepsFilter::class])->thenReturn();

        $sqlWithBindings = Str::replaceArray('?', $builder->getBindings(), $builder->toSql());

        $this->assertStringContainsString('`sleeps` >= 1', $sqlWithBindings);
    }

    /**
     * ensure we return the correct results
     *
     * @return void
     */
    public function test_handles_query(): void
    {
        request()->merge(['sleeps' => '4']);
        $pipeline = app(Pipeline::class);
        $builder = $pipeline->send(Properties::query())->through([MinimumSleepsFilter::class])->thenReturn();

        $properties = (array)$builder->get()->pluck('sleeps')->toArray();

        foreach ($properties as $sleeps) {
            $this->assertGreaterThanOrEqual(4, $sleeps);
        }
    }
}
