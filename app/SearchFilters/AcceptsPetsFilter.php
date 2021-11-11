<?php

namespace App\SearchFilters;

use Closure;
use Illuminate\Database\Eloquent\Builder;

class AcceptsPetsFilter extends AbstractSearchFilter
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
        $query->where('accepts_pets', '=', 1);

        return $query;
    }

    /**
     *
     * @return bool
     */
    public function hasValidRequest(): bool
    {
        return (request()->has('accepts_pets') && request('accepts_pets') == 1);
    }
}
