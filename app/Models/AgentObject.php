<?php

namespace App\Models;

use App\Traits\UrlAliasAccess;
use Illuminate\Database\Eloquent\Model;
use Orchid\Attachment\Attachable;

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
	    'street_view',
	    'youtube_link',
	    'type_id'
    ];

    protected $route = 'object.view';

    public function user()
    {
    	return $this->belongsTo('App\User');
    }

    public function images()
    {
    	return $this->hasMany('App\Models\ObjectImage', 'object_id', 'id');
    }

}
