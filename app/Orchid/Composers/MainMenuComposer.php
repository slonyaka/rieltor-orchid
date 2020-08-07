<?php

declare(strict_types=1);

namespace App\Orchid\Composers;

use Illuminate\Support\Facades\Auth;
use Orchid\Platform\Dashboard;
use Orchid\Platform\ItemMenu;
use Orchid\Platform\Menu;

class MainMenuComposer
{
    /**
     * @var Dashboard
     */
    private $dashboard;

    /**
     * MenuComposer constructor.
     *
     * @param Dashboard $dashboard
     */
    public function __construct(Dashboard $dashboard)
    {
        $this->dashboard = $dashboard;
    }

    /**
     * Registering the main menu items.
     */
    public function compose()
    {

        // Main
        $this->dashboard->menu
	        ->add(Menu::MAIN,
		        ItemMenu::label('My page')
		                ->icon('icon-monitor')
		                ->route('agent.landing', ['slug' => Auth::user()->getUrlAlias()])
	        )
            ->add(Menu::MAIN,
                ItemMenu::label('My objects')
                    ->icon('icon-monitor')
                    ->route('platform.rieltor')
            )
	        ->add(Menu::MAIN,
		        ItemMenu::label('My settings')
		                ->icon('icon-monitor')
		                ->route('platform.rieltor.account')

	        );
    }
}
