<?php

namespace app\Repositories;

interface BookingRepositoryInterface
{
    public function all();
    public function findByPk(int $bookingId);
}
