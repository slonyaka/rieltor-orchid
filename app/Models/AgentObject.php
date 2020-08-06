<?php

namespace App\Models;

use App\Orchid\Presenters\RieltorObjectPresenter;
use Illuminate\Database\Eloquent\Model;

class AgentObject extends Model
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

    public function getUrlAlias()
    {
    	$slug = UrlAlias::where(['model' => static::class, 'entity_id' => $this->id])->pluck('keyword')->first();
    	if (!empty($slug)) {
		    return route('object.view', ['slug' => $slug]);
	    }

	    return '';
    }

    public function getByUrlAlias($slug)
    {
    	return UrlAlias::getBySlug($slug);
    }
}
