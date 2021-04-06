<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */

namespace App\Modules\Councilor\App\Http\Livewire\Commissions;


use App\Modules\Councilor\App\Models\Commission;
use SIGA\Form\FormComponent;

class EditComponent extends FormComponent
{

        protected $route = "commissions";

        public function mount(Commission $commission)
        {
           $this->setFormProperties($commission);
        }

        /**
        * @return array
        */
        public function fields()
        {
            return [];
        }
}
