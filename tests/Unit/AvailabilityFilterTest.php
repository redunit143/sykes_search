<?php

namespace Tests\Unit;

use App\Models\Properties;
use Illuminate\Pipeline\Pipeline;
use Illuminate\Support\Str;
use Tests\TestCase;
use App\SearchFilters\AvailabilityFilter;

class AvailabilityFilterTest extends TestCase
{
    public function setUp(): void
    {
        parent::setUp();
        $this->artisan('migrate:fresh');
    }

    /**
     *
     * @dataProvider availabilityDateProvider
     *
     * @return void
     */
    public function test_handles_availability($start, $end, $expected, $comment): void
    {
        request()->merge(['start_date' => $start]);
        request()->merge(['end_date' => $end]);

        $pipeline = app(Pipeline::class);
        $builder = $pipeline->send(Properties::query())->through([AvailabilityFilter::class])->thenReturn();

        $properties = (array)$builder->get()->pluck('__pk')->toArray();
        $this->assertEquals($expected, $properties, $comment);
    }

    /**
     * provider for
     * @return array
     */
    public function availabilityDateProvider(): array
    {
        return [
            ['1020-09-01', '1020-09-01', [1,2,3,4,5], 'dates outside of bookings'],
            ['2020-09-01', '2020-09-01', [2,3,4,5], 'dates inside of bookings'],
            ['1020-09-01', '3020-09-01', [2,3,4,5], 'dates encompassing all of bookings'],
            ['1020-09-01', '2020-09-01', [2,3,4,5], 'start date outside of booking and end date inside of booking'],
            ['2020-09-01', '3020-09-01', [2,3,4,5], 'end date outside of booking and start date inside of booking'],
        ];
    }

    /**
     * test handle function applies the filter
     *
     * @return void
     */
    public function test_handle(): void
    {
        request()->merge(['start_date' => '2020-08-26']);
        request()->merge(['end_date' => '2020-09-28']);
        $pipeline = app(Pipeline::class);
        $builder = $pipeline->send(Properties::query())->through([AvailabilityFilter::class])->thenReturn();

        $sqlWithBindings = Str::replaceArray('?', $builder->getBindings(), $builder->toSql());

        $this->assertStringContainsString(' >= 2020-08-26', $sqlWithBindings);
    }

}
