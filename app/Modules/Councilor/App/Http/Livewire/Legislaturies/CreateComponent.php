<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */

namespace App\Modules\Councilor\App\Http\Livewire\Legislaturies;

use App\Modules\Councilor\App\Models\Legislaturie;
use SIGA\Form\FormComponent;

class CreateComponent extends FormComponent
{

        protected $route = "legislaturies";


        public function mount(Legislaturie $legislatury)
        {
           $this->setFormProperties($legislatury);
        }

        /**
        * @return array
        */
        public function fields()
        {
            return [];
        }
}
