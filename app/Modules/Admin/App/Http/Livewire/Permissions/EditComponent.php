<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */

namespace App\Modules\Admin\App\Http\Livewire\Permissions;

use SIGA\Form\FormComponent;
use Illuminate\Database\Eloquent\Builder;

class EditComponent extends FormComponent
{

        protected $route = "[route]";

        public function mount($model=null)
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
