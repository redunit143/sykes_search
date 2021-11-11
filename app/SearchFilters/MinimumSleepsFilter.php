<?php

namespace App\SearchFilters;

use Closure;
use Illuminate\Database\Eloquent\Builder;

class MinimumSleepsFilter extends AbstractSearchFilter
{
    /**
     *
     * @param Builder $builder
     * @param Closure $next
     * @return Builder
     */
    public function applyFilter(Builder $builder, Closure $next): Builder
    {
        $sleeps = request('sleeps');

        $query = $next($builder);
        $query->where('sleeps', '>=', $sleeps);

        return $query;
    }

    /**
     *
     * @return bool
     */
    public function hasValidRequest(): bool
    {
        return (request()->has('sleeps') && request('sleeps') > 0);
    }
}
