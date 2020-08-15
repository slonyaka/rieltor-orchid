<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UrlAlias extends Model
{
    protected $fillable = ['model', 'entity_id', 'keyword'];

    public static function makeKeyword($name)
    {
	    $converter = array(
		    'а' => 'a',   'б' => 'b',   'в' => 'v',
		    'г' => 'g',   'д' => 'd',   'е' => 'e',
		    'ё' => 'e',   'ж' => 'zh',  'з' => 'z',
		    'и' => 'i',   'й' => 'y',   'к' => 'k',
		    'л' => 'l',   'м' => 'm',   'н' => 'n',
		    'о' => 'o',   'п' => 'p',   'р' => 'r',
		    'с' => 's',   'т' => 't',   'у' => 'u',
		    'ф' => 'f',   'х' => 'h',   'ц' => 'c',
		    'ч' => 'ch',  'ш' => 'sh',  'щ' => 'sch',
		    'ь' => '\'',  'ы' => 'y',   'ъ' => '\'',
		    'э' => 'e',   'ю' => 'yu',  'я' => 'ya',

		    'А' => 'A',   'Б' => 'B',   'В' => 'V',
		    'Г' => 'G',   'Д' => 'D',   'Е' => 'E',
		    'Ё' => 'E',   'Ж' => 'Zh',  'З' => 'Z',
		    'И' => 'I',   'Й' => 'Y',   'К' => 'K',
		    'Л' => 'L',   'М' => 'M',   'Н' => 'N',
		    'О' => 'O',   'П' => 'P',   'Р' => 'R',
		    'С' => 'S',   'Т' => 'T',   'У' => 'U',
		    'Ф' => 'F',   'Х' => 'H',   'Ц' => 'C',
		    'Ч' => 'Ch',  'Ш' => 'Sh',  'Щ' => 'Sch',
		    'Ь' => '\'',  'Ы' => 'Y',   'Ъ' => '\'',
		    'Э' => 'E',   'Ю' => 'Yu',  'Я' => 'Ya',
	    );

	    return trim(preg_replace('~[^-a-z0-9_]+~u', '-', mb_strtolower(strtr($name, $converter))), "-");
    }

	public static function getBySlug( $slug ) {

    	$entity = static::where('keyword', $slug)->first();

    	//dd($slug);

    	return $entity->model::find($entity->entity_id);
	}
}
