<?php

namespace App\Orchid\Screens;

use App\Models\UrlAlias;
use App\User;
use Illuminate\Support\Facades\Auth;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Layout;
use Orchid\Screen\Screen;

class AgentSettings extends Screen
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

    	$data = [
    		'id' => $user->id,
		    'email' => $user->email
	    ];


	    $data['full_name'] = ($user->meta) ? $user->meta->firstname .' '. $user->meta->lastname : $user->name;
	    $data['phone'] = ($user->meta) ? $user->meta->phone : '';
	    $data['company'] = ($user->meta) ? $user->meta->company : '';
	    $data['address'] = ($user->meta) ? $user->meta->address : '';
	    $data['avatar'] = ($user->meta) ? $user->meta->avatar : '';

        return $data;
    }

    /**
     * Button commands.
     *
     * @return Action[]
     */
    public function commandBar(): array
    {
    	$userSlug = UrlAlias::where(['model' => User::class, 'entity_id' => Auth::user()->id])->first();

        return [
	        Link::make(__('View'))
	            ->href(route('agent.landing', ['slug' => $userSlug->keyword]))
	            ->icon('icon-eye'),

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
