<?php

namespace Tests\Unit;

use App\Http\Requests\SearchRequest;
use Tests\TestCase;

class SearchRequestTest extends TestCase
{
    public function searchRequestDataProvider(): array
    {
        return [
            [
                [
                    'start_date' => '2021-10-10',
                    'end_date' => '2021-11-10',
                    'location' => 'Scotland',
                    'beds' => '3',
                    'sleeps' => '3',
                ],
                true
            ],
            [
                [
                    'start_date' => '1999-10-10',
                    'end_date' => '2265-11-10',
                    'location' => 'Scotland',
                    'beds' => '3',
                    'sleeps' => '3',
                ],
                true
            ],
            [
                [
                    'start_date' => '2021-10-10',
                    'end_date' => '2021-11-10',
                    'location' => 'Scotland 123',
                    'beds' => '3',
                    'sleeps' => '3',
                ],
                false
            ],
            [
                [
                    'start_date' => '2021-10-10',
                    'end_date' => '2021-11-10',
                    'location' => 'Scotland',
                    'beds' => '3',
                    'sleeps' => '3',
                ],
                true
            ],
            [
                [
                    'start_date' => '2021-10-10',
                    'end_date' => '1999-11-10',
                    'location' => 'Scotland',
                    'beds' => '3',
                    'sleeps' => '3',
                ],
                false
            ],
            [
                [
                    'start_date' => '2021-10-10',
                    'end_date' => '2021-11-10',
                    'location' => 'Scotland',
                    'beds' => '30',
                    'sleeps' => '3',
                ],
                false
            ],
        ];
    }

    /**
     * @dataProvider searchRequestDataProvider
     */
    public function testSearchRequest($data, $expected): void
    {
        $request = SearchRequest::create('/search', 'POST');

        $rules = $request->rules();

        /**
         *
         * @var \Illuminate\Validation\Validator $v
         */
        $v = $this->app['validator']->make($data, $rules);

        $this->assertEquals($expected, $v->passes());
    }
}
