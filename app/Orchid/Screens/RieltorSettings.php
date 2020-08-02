<?php

namespace App\Orchid\Screens;

use Illuminate\Support\Facades\Auth;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Layout;
use Orchid\Screen\Screen;

class RieltorSettings extends Screen
{
    /**
     * Display header name.
     *
     * @var string
     */
    public $name = 'My account';

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
    	$user = Auth::user();
        return [
        	'user' => $user,
	        'meta' => $user->meta
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
	        Link::make(__('Edit'))
	            ->href(route('platform.rieltor.edit', ['id' => Auth::user()->id]))
	            ->icon('icon-pencil')
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
        	Layout::view('layouts.account')
        ];
    }
}
