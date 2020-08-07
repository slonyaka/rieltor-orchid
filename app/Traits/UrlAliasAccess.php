<?php

namespace App\Traits;

use App\Models\UrlAlias;

trait UrlAliasAccess {

	public function getRoute()
	{
		$slug = $this->getUrlAlias();

		if (!empty($slug)) {
			return route($this->route, ['slug' => $slug]);
		}

		return '';
	}

	public function getUrlAlias()
	{
		return UrlAlias::where(['model' => static::class, 'entity_id' => $this->id])->pluck('keyword')->first();

	}

	public function getByUrlAlias($slug)
	{
		return UrlAlias::getBySlug($slug);
	}
}