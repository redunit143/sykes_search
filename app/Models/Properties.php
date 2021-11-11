<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Properties extends Model
{
    use HasFactory;

    /**
     *
     * @var string
     */
    protected $primaryKey = '__pk';

    /**
     * @var bool
     */
    public $timestamps = false;

    /**
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function bookings(): HasMany
    {
        return $this->hasMany(Bookings::class, '_fk_property', '__pk');
    }

    /**
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function location(): HasOne
    {
        return $this->hasOne(Locations::class, '__pk', '_fk_location');
    }
}
