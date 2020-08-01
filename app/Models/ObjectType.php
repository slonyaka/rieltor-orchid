<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ObjectType extends Model
{
    public const APARTMENT = 1;
    public const HOUSE = 2;
    public const OFFICE = 3;
    public const COMMERCIAL = 4;
    public const GROUND_PLOT = 2;
    public const GARAGE = 2;
}
