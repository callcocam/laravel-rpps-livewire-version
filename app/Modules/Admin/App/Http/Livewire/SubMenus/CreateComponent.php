<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */

namespace App\Modules\Admin\App\Http\Livewire\SubMenus;

use App\Modules\Admin\App\Models\Menu;
use App\Modules\Admin\App\Models\SubMenu;
use App\Modules\Helpers\IconsHelper;
use SIGA\Form\Fields\Hidden;
use SIGA\Form\Fields\Radio;
use SIGA\Form\Fields\Select;
use SIGA\Form\Fields\Text;
use SIGA\Form\FormComponent;

class CreateComponent extends FormComponent
{

    protected $route = "sub-menus";

    public function mount(SubMenu $submenu)
    {

        $this->setFormProperties($submenu);
    }

    /**
     * @return array
     */
    public function fields()
    {
        $submenu = SubMenu::query();
        $menu = Menu::query();
        return [
            Radio::make('assets')->options([
                "link",
                "dropdown",
                "title",
            ])->inline(),
            Hidden::make('user_id')->default(auth()->id()),
            Text::make('Name'),
            Text::make('Slug'),
            Select::make('Menu', 'menu_id')->target($menu, $this->isSingleSelectSearch('menu_id')),
            Select::make('Sub Menus', 'parent')->target($submenu, $this->isSingleSelectSearch('parent')),
            Text::make('Link'),
            Select::make('Icone')->options($this->icons()),
        ];
    }

    public function success()
    {
        if(parent::success()){
            $this->emit('loadMenus', true);
            return true;
        }
        return false;
    }

    protected function icons()
    {
        $data = [];

        $list = IconsHelper::make()->collect($this->isSingleSelectSearch('icone'));

        foreach ($list as $value) {
            $data[$value] = $value;
        }
        return $data;
    }
}
