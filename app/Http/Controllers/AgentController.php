<?php

namespace App\Http\Controllers;

use App\Models\UrlAlias;
use App\User;
use Illuminate\Http\Request;

class AgentController extends Controller
{
    public function index($slug)
    {
    	$user = UrlAlias::getBySlug($slug);
    	if (!$user->exists && is_numeric($slug)) {
    		$user = User::findOrFail($slug);
	    }

	    return view('agent', ['user' => $user]);
    }
}
