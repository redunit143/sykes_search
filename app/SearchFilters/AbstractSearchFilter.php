<?php

namespace app\SearchFilters;

use Closure;
use Illuminate\Database\Eloquent\Builder;

abstract class AbstractSearchFilter
{

    abstract public function applyFilter(Builder $builder, Closure $next): Builder;

    abstract public function hasValidRequest(): bool;

    /**
     *
     * @param Builder $builder
     * @param Closure $next
     * @return Builder
     */
    public function handle(Builder $builder, Closure $next): Builder
    {
        if (!$this->hasValidRequest()) {
            return $next($builder);
        }

        return $this->applyFilter($builder, $next);
    }
}
