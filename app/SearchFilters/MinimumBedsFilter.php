<?php

namespace App\SearchFilters;

use Closure;
use Illuminate\Database\Eloquent\Builder;

class MinimumBedsFilter extends AbstractSearchFilter
{
    /**
     *
     * @param Builder $builder
     * @param Closure $next
     * @return Builder
     */
    public function applyFilter(Builder $builder, Closure $next): Builder
    {
        $beds = request('beds');

        $query = $next($builder);
        $query->where('beds', '>=', $beds);

        return $query;
    }

    /**
     *
     * @return bool
     */
    public function hasValidRequest(): bool
    {
        return (request()->has('beds') && request('beds') > 0);
    }
}
