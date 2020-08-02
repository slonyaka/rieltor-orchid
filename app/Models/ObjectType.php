<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ObjectType extends Model
{
    public const APARTMENT = 1;
    public const HOUSE = 2;
    public const OFFICE = 3;
    public const COMMERCIAL = 4;
    public const GROUND_PLOT = 5;
    public const GARAGE = 6;

    public static function getName($type)
    {
    	switch ($type) {
		    case self::APARTMENT:
		    	$name = __('Apartment');
		    	break;
		    case self::HOUSE:
		    	$name = __('House');
		    	break;
		    case self::OFFICE:
		    	$name = __('Office');
		    	break;
		    case self::COMMERCIAL:
		    	$name = __('Commercial');
			    break;
		    case self::GROUND_PLOT:
		    	$name = __('Ground Plot');
		    	break;
		    case self::GARAGE:
		    	$name = __('Garage');
		    	break;
		    default:
		    	$name = '';
	    }

	    return $name;
    }

    public static function getList()
    {
    	return [
		    static::APARTMENT => static::getName(static::APARTMENT),
		    static::HOUSE => static::getName(static::HOUSE),
		    static::OFFICE => static::getName(static::OFFICE),
		    static::COMMERCIAL => static::getName(static::COMMERCIAL),
		    static::GROUND_PLOT => static::getName(static::GROUND_PLOT),
		    static::GARAGE => static::getName(static::GARAGE),
	    ];
    }
}
