<?php

namespace App\Orchid\Screens;

use App\Models\RieltorObject;
use Illuminate\Support\Facades\Auth;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Layout;
use Orchid\Screen\Screen;

class RieltorScreen extends Screen
{
    /**
     * Display header name.
     *
     * @var string
     */
    public $name = 'My objects';

    /**
     * Display header description.
     *
     * @var string
     */
    public $description = '';

    /**
     * Query data.
     *
     * @return array
     */
    public function query(): array
    {

    	$objects = RieltorObject::where('user_id', Auth::user()->id)->paginate();

        return [
        	'objects' => $objects
        ];
    }

    /**
     * Button commands.
     *
     * @return Action[]
     */
    public function commandBar(): array
    {
        return [
        	Link::make(__('Add'))
	            ->href(route('platform.object.create'))
		        ->icon('icon-plus')
        ];
    }

    /**
     * Views.
     *
     * @return Layout[]
     */
    public function layout(): array
    {
	    return [
		    Layout::view('layouts.objects_grid')
	    ];

    }
}
