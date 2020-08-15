<?php

namespace App\Http\Controllers;

use App\Models\ObjectImage;
use App\Models\UrlAlias;
use Illuminate\Database\Eloquent\Collection;
use Orchid\Attachment\Models\Attachment;


class LandingController extends Controller
{
    public function index($slug)
    {
		$object = UrlAlias::getBySlug($slug);

		$images = new Collection();

		if (!empty($object->images)) {
			foreach($object->images as $image) {
				$attachment = Attachment::find($image->path);

				$images->push($attachment);
			}
		}


		return view('object', [
			'object' => $object,
			'images' => $images
		]);
    }
}
