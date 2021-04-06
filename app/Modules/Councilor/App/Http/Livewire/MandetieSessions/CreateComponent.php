<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */

namespace App\Modules\Councilor\App\Http\Livewire\MandetieSessions;


use App\Modules\Councilor\App\Models\MandetieSession;
use SIGA\Form\FormComponent;

class CreateComponent extends FormComponent
{

        protected $route = "mandetiesessions";


        public function mount(MandetieSession $mandetiesession)
        {
           $this->setFormProperties($mandetiesession);
        }

        /**
        * @return array
        */
        public function fields()
        {
            return [];
        }
}
