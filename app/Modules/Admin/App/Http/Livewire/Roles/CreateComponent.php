<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */

namespace App\Modules\Admin\App\Http\Livewire\Roles;

use App\Modules\Admin\App\Models\Permission;
use App\Modules\Admin\App\Models\Role;
use SIGA\Form\Fields\MultiSelect;
use SIGA\Form\Fields\Select;
use SIGA\Form\Fields\Text;
use SIGA\Form\FormComponent;

class CreateComponent extends FormComponent
{
       public function mount(Role $role){

           $this->model = $role;

       }

        protected $route = "roles";

        /**
        * @return array
        */
        public function fields()
        {
            return [
                Text::make('name'),
                Select::make('special')->options(['no-access' => 'no-access', 'all-access' => 'all-access', 'no-defined' => 'no-defined']),
                MultiSelect::make('access')
                    ->target(Permission::query(), $this->isMultSelectSearch('access'))->inline()
            ];
        }
}
