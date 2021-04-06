<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */

namespace App\Modules\Councilor\App\Http\Livewire\Affiliations;

use App\Modules\Councilor\App\Models\Affiliation;
use SIGA\Form\Fields\Text;
use SIGA\Form\FormComponent;

class EditComponent extends FormComponent
{

        protected $route = "affiliations";

        public function mount(Affiliation $affiliation)
        {
           $this->setFormProperties($affiliation);
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
