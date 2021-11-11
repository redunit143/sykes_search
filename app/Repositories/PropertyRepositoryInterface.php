<?php

namespace app\Repositories;

use App\Models\Properties;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;

interface PropertyRepositoryInterface
{
    public function all(): Collection;
    public function findByPk(int $bookingId): Properties;
    public function searchProperty(): Builder;
}
