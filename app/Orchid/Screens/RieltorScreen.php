<?php

namespace App\Orchid\Screens;

use Orchid\Screen\Screen;

class RieltorScreen extends Screen
{
    /**
     * Display header name.
     *
     * @var string
     */
    public $name = 'Rieltor Screen';

    /**
     * Display header description.
     *
     * @var string
     */
    public $description = 'Rieltor Screen';

    /**
     * Query data.
     *
     * @return array
     */
    public function query(): array
    {

        return [];
    }

    /**
     * Button commands.
     *
     * @return Action[]
     */
    public function commandBar(): array
    {
        return [];
    }

    /**
     * Views.
     *
     * @return Layout[]
     */
    public function layout(): array
    {
        return [];
    }
}
