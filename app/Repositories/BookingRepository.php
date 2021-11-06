<?php

namespace App\Repositories;

use App\Models\Bookings;
use Illuminate\Database\Eloquent\Collection;

class BookingRepository implements BookingRepositoryInterface
{
    private $bookings;

    public function __construct(Bookings $bookings)
    {
        $this->bookings = $bookings;
    }

    /**
     * Returns all bookings
     *
     * @return Collection
     */
    public function all(): Collection
    {
        return $this->bookings->all();
    }

    public function findByPk(int $bookingId): Bookings
    {
        return $this->bookings->where('__pk', $bookingId)->firstOrFail();
    }
}
