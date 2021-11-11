<?php

namespace App\SearchFilters;

use Closure;
use Illuminate\Database\Eloquent\Builder;
use App\Models\Locations;

class LocationFilter extends AbstractSearchFilter
{
    /**
     *
     * @param Builder $builder
     * @param Closure $next
     * @return Builder
     */
    public function applyFilter(Builder $builder, Closure $next): Builder
    {
        $query = $next($builder);
        $query->whereHas('location', function ($q) {
            $q->where('location_name', 'like', '%' . request('location') . '%');
        });

        return $query;
    }

    /**
     *
     * @return bool
     */
    public function hasValidRequest(): bool
    {
        return (request()->has('location') && request('location') != '');
    }
}
