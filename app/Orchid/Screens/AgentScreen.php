<?php

namespace App\Orchid\Screens;

use App\Models\AgentObject;
use Illuminate\Support\Facades\Auth;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Layout;
use Orchid\Screen\Screen;

class AgentScreen extends Screen
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

    	$objects = AgentObject::where('user_id', Auth::user()->id)->paginate();

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
		    Layout::view('layouts.objects_grid'),
		    Layout::modal('linkModals', [
			    Layout::rows([
					Input::make('url_alias')
			    ]),
		    ])->async('asyncGetObjectLink')
		    ->withoutApplyButton()
	    ];

    }

	public function asyncGetObjectLink(AgentObject $object)
	{
		return [
			'url_alias' => $object->getRoute()
		];
	}

}
