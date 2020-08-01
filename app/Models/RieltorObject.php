<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RieltorObject extends Model
{
    protected $table = 'objects';

    protected $fillable = [
    	'user_id',
	    'name',
	    'description',
	    'image',
	    'address',
	    'price',
	    'room_count',
	    'floor',
	    'square_full',
	    'square_live',
	    'square_kitchen',
	    'type_id'
    ];
}
