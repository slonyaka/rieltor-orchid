<?php

namespace App\Http\Controllers;

use App\Models\AgentObject;
use App\Models\UrlAlias;
use Illuminate\Http\Request;

class LandingController extends Controller
{
    public function index($slug)
    {
		$model = UrlAlias::getBySlug($slug);

		var_dump($model->user_id);
    }
}
