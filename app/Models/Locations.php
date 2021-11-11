<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Locations extends Model
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
}
