<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserMeta extends Model
{
    protected $fillable = [
    	'user_id',
    	'firstname',
	    'lastname',
	    'phone',
	    'company',
	    'address',
	    'avatar'
    ];
}
