<?php

namespace App\Repositories;

use App\Models\Properties;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pipeline\Pipeline;
use App\SearchFilters\AcceptsPetsFilter;
use App\SearchFilters\LocationFilter;
use App\SearchFilters\MinimumSleepsFilter;
use App\SearchFilters\NearBeachFilter;
use App\SearchFilters\MinimumBedsFilter;
use App\SearchFilters\AvailabilityFilter;

class PropertyRepository implements PropertyRepositoryInterface
{
    /**
     *
     * @var Properties
     */
    private $properties;

    /**
     *
     * @var array
     */
    private $searchFilters = [
        AvailabilityFilter::class,
        AcceptsPetsFilter::class,
        LocationFilter::class,
        MinimumBedsFilter::class,
        MinimumSleepsFilter::class,
        NearBeachFilter::class,
    ];

    public function __construct(Properties $properties)
    {
        $this->properties = $properties;
    }

    /**
     * Returns all bookings
     *
     * @return Collection
     */
    public function all(): Collection
    {
        return $this->properties->all();
    }

    /**
     *
     * @param int $propertyId
     * @return Properties
     */
    public function findByPk(int $propertyId): Properties
    {
        return $this->properties->where('__pk', $propertyId)->firstOrFail();
    }

    /**
     *
     * @return Builder
     */
    public function searchProperty(): Builder
    {
        $pipeline = app(Pipeline::class);
        $builder = $pipeline
            ->send(Properties::query())
            ->through($this->searchFilters)
            ->thenReturn();
        return $builder;
    }
}
