<?php

namespace App\Orchid\Screens;

use App\Models\UrlAlias;
use App\Models\UserMeta;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Fields\Cropper;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\Picture;
use Orchid\Screen\Fields\Quill;
use Orchid\Screen\Fields\TextArea;
use Orchid\Screen\Layout;
use Orchid\Screen\Screen;
use Orchid\Support\Facades\Toast;

class AgentEditScreen extends Screen
{
    /**
     * Display header name.
     *
     * @var string
     */
    public $name = 'Edit account';

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
        return [
			'user' => Auth::user(),
	        'user_meta' => Auth::user()->meta
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
	        Link::make(__('Back'))
	            ->href(route('platform.rieltor.account'))
	            ->icon('icon-action-undo'),

	        Button::make(__('Save'))
	              ->icon('icon-check')
	              ->method('save'),
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
        	Layout::rows([

		        Input::make('user_meta.user_id')
			         ->value(Auth::user()->id)
		             ->type('hidden'),

		        Input::make('user_meta.firstname')
		             ->type('text')
		             ->max(255)
			        ->value(Auth::user()->meta->firstname ?? Auth::user()->name)
		             ->title(__('Firstname'))
		             ->placeholder(__('Firstname')),

		        Input::make('user_meta.lastname')
		             ->type('text')
		             ->max(255)
		             ->title(__('Lastname'))
		             ->placeholder(__('Lastname')),

		        Input::make('user_meta.phone')
		             ->type('text')
		             ->max(255)
			         ->mask('(999) 9999999')
		             ->title(__('Phone'))
		             ->placeholder(__('Phone')),

		        Input::make('user_meta.company')
		             ->type('text')
		             ->max(255)
		             ->title(__('Company'))
		             ->placeholder(__('Company')),

		        Input::make('user_meta.address')
		             ->type('text')
		             ->max(255)
		             ->title(__('Address'))
		             ->placeholder(__('Address')),

		        Quill::make('user_meta.description')
		            ->title(__('About me')),

		        Picture::make('user_meta.profile_image')
			            ->class('avatar-image-uploader')
		               ->title(__('Profile image')),

		        Cropper::make('user_meta.avatar')
			            ->class('avatar-image-uploader')
		               ->width(500)
		               ->height(500)

	        ])

        ];
    }

    public function save(User $user, Request $request)
    {
    	$request->validate([
    		'user_meta.firstname' => 'alpha|nullable',
		    'user_meta.lastname' => 'alpha|nullable'
	    ]);

    	$userMeta = UserMeta::firstOrNew(['user_id' => $user->id]);

	    $userMeta->fill($request->get('user_meta'));
	    $userMeta->save();

	    $keyword = $user->id;

	    if (!empty($userMeta->firstname) && !empty($userMeta->lastname)) {
			$keyword .= '-'. UrlAlias::makeKeyword($userMeta->firstname .'-'. $userMeta->lastname);
	    }

	    $data = [
		    'model' => User::class,
		    'entity_id' => $user->id,
		    'keyword' => $keyword
	    ];

	    $urlAlias = UrlAlias::firstOrNew(['model' => $data['model'], 'entity_id' => $data['entity_id']]);

	    $urlAlias->fill($data);
	    $urlAlias->save();

	    Toast::info(__('Settings were saved.'));

	    return redirect()->route('platform.rieltor.account');
    }
}
