<?php

namespace App\Models;

use App\Traits\UrlAliasAccess;
use Illuminate\Database\Eloquent\Model;

class AgentObject extends Model
{
	use UrlAliasAccess;

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

    protected $route = 'object.view';

}
