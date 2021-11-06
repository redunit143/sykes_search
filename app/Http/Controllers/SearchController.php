<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bookings;
use App\Repositories\BookingRepository;
use App\Repositories\BookingRepositoryInterface;

class SearchController extends Controller
{
    /**
     *
     * @var \App\Repositories\BookingRepository
     */
    private $bookingRepository;

    public function __construct(BookingRepositoryInterface $bookingRepository)
    {
        $this->bookingRepository = $bookingRepository;
    }

    //
    public function getProperty()
    {
        //return $this->bookingRepository->all();
        return $this->bookingRepository->findByPk(2);
    }

    public function propertyLookUp()
    {
        $bookings = [];
        //
        return view('booking.lookup', compact('bookings'));
    }
}
