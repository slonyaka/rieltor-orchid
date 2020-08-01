<?php

namespace App\Orchid\Screens;

use App\Models\ObjectImage;
use App\Models\ObjectType;
use App\Models\RieltorObject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\Picture;
use Orchid\Screen\Fields\Select;
use Orchid\Screen\Fields\TextArea;
use Orchid\Screen\Fields\Upload;
use Orchid\Screen\Layout;
use Orchid\Screen\Screen;
use Orchid\Support\Facades\Toast;

class RieltorObjectEditScreen extends Screen
{
    /**
     * Display header name.
     *
     * @var string
     */
    public $name = 'Rieltor Object Edit Screen';

    /**
     * Display header description.
     *
     * @var string
     */
    public $description = 'Here you can create or edit object';

    public $exists;
    /**
     * Query data.
     *
     * @return array
     */
    public function query(RieltorObject $object): array
    {
        $this->exists = $object->exists;
        return [
        	'object' => $object
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
	            ->href(route('platform.rieltor'))
	            ->icon('icon-action-undo'),

	        Button::make(__('Save'))
	              ->icon('icon-check')
	              ->method('save'),

	        Button::make(__('Remove'))
		          ->canSee($this->exists)
	              ->icon('icon-trash')
	              ->confirm('Are you sure you want to delete the user?')
	              ->method('remove'),
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

		        Select::make('object.type_id')
		              ->options([
			              ObjectType::APARTMENT => ObjectType::getName(ObjectType::APARTMENT),
			              ObjectType::HOUSE => ObjectType::getName(ObjectType::HOUSE),
			              ObjectType::OFFICE => ObjectType::getName(ObjectType::OFFICE),
			              ObjectType::COMMERCIAL => ObjectType::getName(ObjectType::COMMERCIAL),
			              ObjectType::GROUND_PLOT => ObjectType::getName(ObjectType::GROUND_PLOT),
			              ObjectType::GARAGE => ObjectType::getName(ObjectType::GARAGE),
		              ])
		              ->required()
		              ->title(__('Object type')),

		        Input::make('object.name')
		             ->type('text')
		             ->max(255)
		             ->required()
		             ->title(__('Name'))
		             ->placeholder(__('Name')),

		        TextArea::make('object.description')
		               ->title(__('Description'))
		               ->rows(6),

		        Picture::make('object.image')
		               ->title(__('Picture')),

		        Upload::make('object.images.')
		              ->title(__('Additional pictures')),

		        Input::make('object.address')
		             ->type('text')
		             ->max(255)
		             ->title(__('Address'))
		             ->placeholder(__('Address')),

		        Input::make('object.price')
		             ->type('number')
			         ->min(0)
		             ->max(10000000)
		             ->title(__('Price'))
		             ->placeholder(__('Price')),

		        Input::make('object.room_count')
		             ->type('number')
		             ->min(0)
		             ->max(1000)
		             ->title(__('Room count'))
		             ->placeholder(__('Room count')),

		        Input::make('object.floor')
		             ->type('number')
		             ->min(0)
		             ->max(1000)
		             ->title(__('Floor'))
		             ->placeholder(__('Floor')),

		        Input::make('object.square_full')
		             ->type('number')
		             ->min(0)
			         ->step(0.1)
		             ->max(1000000)
		             ->title(__('Full square'))
		             ->placeholder(__('Full square')),

		        Input::make('object.square_live')
		             ->type('number')
		             ->min(0)
		             ->step(0.1)
		             ->max(1000000)
		             ->title(__('Living space square'))
		             ->placeholder(__('Living space square')),

		        Input::make('object.kitchen')
		             ->type('number')
		             ->min(0)
		             ->step(0.1)
		             ->max(1000000)
		             ->title(__('Kitchen square'))
		             ->placeholder(__('Kitchen square')),
	        ])
        ];
    }

    public function save(RieltorObject $rieltorObject, Request $request)
    {

    	$request->validate([
    		'object.name' => 'required',
		    'object.type_id' => 'required|digits_between:'. ObjectType::APARTMENT .','. ObjectType::GARAGE,
		    'object.floor' => 'integer|nullable',
		    'object.room_count' => 'integer|nullable',
		    'object.square_full' => 'numeric|nullable',
		    'object.square_live' => 'numeric|nullable',
		    'object.square_kitchen' => 'numeric|nullable',
	    ]);

    	$objectData = $request->get('object');


	    $rieltorObject->fill(array_merge($objectData, ['user_id' => Auth::user()->id]));
	    $rieltorObject->save();

	    if (!empty($objectData['images'])) {

	    	ObjectImage::where('object_id', $rieltorObject->id)->delete();

	    	foreach ($objectData['images'] as $image) {

				$objectImage = new ObjectImage();

			    $objectImage->fill([
			    	'object_id' => $rieltorObject->id,
				    'path' => $image[0]
			    ]);

			    $objectImage->save();
		    }
	    }

	    Toast::info(__('Object was saved.'));

	    return redirect()->route('platform.rieltor');
    }

	public function remove(RieltorObject $rieltorObject)
	{
		$rieltorObject->delete();

		Toast::info(__('Object was removed'));

		return redirect()->route('platform.rieltor');
	}
}
