<?php

namespace App\Http\ViewComposers;

use Illuminate\View\View;
use TCG\Voyager\Models\Menu;
use TCG\Voyager\Voyager;

class TemplateComposer
{
    public $menu;
    public $title;
    public $logo;
    /**
     * Create a movie composer.
     *
     * @return void
     */
    public function __construct()
    {

    }

    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $this->menu = $this->getMenu();
        $this->title = $this->getTitle();
        $this->logo = $this->getLogo();
        $view->with(
            [
                'menu' => $this->menu,
                'title' => $this->title,
                'logo' => $this->logo
            ]
        );
    }

    public function getTitle(){

        try{
            $this->title = setting('site.title');
        }catch (\Exception $e){
            return 'Site Title';
        }
        return $this->title;
    }

    public function getMenu(){
        $this->menu = Menu::display(config('template.main_menu_name'));
        return $this->menu;
    }

    public function getLogo(){


        try{
            $logo_img = asset('storage/'.setting('site.logo'));
            $this->logo = $logo_img;
        }catch (\Exception $e){
            return '';
        }
        return $this->logo;

    }
}