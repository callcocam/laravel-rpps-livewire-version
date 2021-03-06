<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */

namespace App\Modules\Admin\App\Http\Livewire\Permissions;

use App\Modules\Admin\App\Models\Permission;
use SIGA\Form\FormComponent;

class EditComponent extends FormComponent
{

        protected $route = "permissions";

        public function mount(Permission $model)
        {
           $this->setFormProperties($model);
        }

        /**
        * @return array
        */
        public function fields()
        {
            return [];
        }
}
