<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */

namespace App\Modules\Councilor\App\Http\Livewire\MandateReasons;


use App\Modules\Councilor\App\Models\MandateReason;
use SIGA\Form\Fields\Status;
use SIGA\Form\Fields\Text;
use SIGA\Form\Fields\Textarea;
use SIGA\Form\FormComponent;

class EditComponent extends FormComponent
{

        protected $route = "mandatereasons";

        public function mount(MandateReason $mandatereason)
        {
           $this->setFormProperties($mandatereason);
        }

        /**
        * @return array
        */
        public function fields()
        {
            return [
                Text::make('name'),
                Textarea::make('description'),
                Status::make('status'),
            ];
        }
}
