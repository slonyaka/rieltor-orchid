<?php

namespace App\Orchid\Screens;

use App\Models\ObjectType;
use App\Models\RieltorObject;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\Picture;
use Orchid\Screen\Fields\Select;
use Orchid\Screen\Fields\TextArea;
use Orchid\Screen\Fields\Upload;
use Orchid\Screen\Layout;
use Orchid\Screen\Screen;

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
		             ->required()
		             ->title(__('Address'))
		             ->placeholder(__('Address')),

		        Input::make('object.price')
		             ->type('number')
			         ->min(0)
		             ->max(10000000)
		             ->required()
		             ->title(__('Price'))
		             ->placeholder(__('Price')),

		        Input::make('object.room_count')
		             ->type('number')
		             ->min(0)
		             ->max(1000)
		             ->required()
		             ->title(__('Room count'))
		             ->placeholder(__('Room count')),

		        Input::make('object.floor')
		             ->type('number')
		             ->min(0)
		             ->max(1000)
		             ->required()
		             ->title(__('Floor'))
		             ->placeholder(__('Floor')),

		        Input::make('object.square_full')
		             ->type('number')
		             ->min(0)
			         ->step(0.1)
		             ->max(1000000)
		             ->required()
		             ->title(__('Full square'))
		             ->placeholder(__('Full square')),

		        Input::make('object.square_live')
		             ->type('number')
		             ->min(0)
		             ->step(0.1)
		             ->max(1000000)
		             ->required()
		             ->title(__('Living space square'))
		             ->placeholder(__('Living space square')),

		        Input::make('object.kitchen')
		             ->type('number')
		             ->min(0)
		             ->step(0.1)
		             ->max(1000000)
		             ->required()
		             ->title(__('Kitchen square'))
		             ->placeholder(__('Kitchen square')),
	        ])
        ];
    }

    public function save()
    {

    }

    public function remove()
    {

    }
}
