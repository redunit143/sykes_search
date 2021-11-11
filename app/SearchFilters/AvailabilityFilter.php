<?php

namespace App\SearchFilters;

use Closure;
use Illuminate\Database\Eloquent\Builder;

class AvailabilityFilter extends AbstractSearchFilter
{
    /**
     *
     * @param Builder $builder
     * @param Closure $next
     * @return Builder
     */
    public function applyFilter(Builder $builder, Closure $next): Builder
    {
        $start = request('start_date');
        $end = request('end_date');
        /**
         *
         * @var Builder $query
         */
        $query = $next($builder);
        $query->whereDoesntHave('bookings', function ($query) use ($start, $end) {

            $query->where(function ($q) use ($start, $end) {
                $q->where('start_date', '>=', $start)
                ->where('start_date', '<', $end);
            })->orWhere(function ($q) use ($start, $end) {
                $q->where('start_date', '<=', $start)
                ->where('end_date', '>', $end);
            })->orWhere(function ($q) use ($start, $end) {
                $q->where('end_date', '>', $start)
                ->where('end_date', '<=', $end);
            })->orWhere(function ($q) use ($start, $end) {
                $q->where('start_date', '>=', $start)
                ->where('end_date', '<=', $end);
            });
        });

        return $query;
    }

    /**
     *
     * @return bool
     */
    public function hasValidRequest(): bool
    {
        return (
            request()->has('start_date') &&
            request()->has('end_date') &&
            request('end_date') >= request('start_date')
            );
    }
}
