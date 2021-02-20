<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */

namespace App\Modules\Admin\App\Http\Livewire\Menus;

use App\Modules\Admin\App\Models\Menu;
use SIGA\Form\Fields\Text;
use SIGA\Form\FormComponent;

class EditComponent extends FormComponent
{

        protected $route = "menus";

        public function mount(Menu $menu){
            $this->setFormProperties($menu);
        }
        /**
        * @return array
        */
        public function fields()
        {
            return [
                Text::make('Name')
            ];
        }
}
