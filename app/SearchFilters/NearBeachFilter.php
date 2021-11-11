<?php

namespace App\SearchFilters;

use Closure;
use Illuminate\Database\Eloquent\Builder;

class NearBeachFilter extends AbstractSearchFilter
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
        $query->where('near_beach', '=', 1);

        return $query;
    }

    /**
     *
     * @return bool
     */
    public function hasValidRequest(): bool
    {
        return (request()->has('near_beach') && request('near_beach') == 1);
    }
}
