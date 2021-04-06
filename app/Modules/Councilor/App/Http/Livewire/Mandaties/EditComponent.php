<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */

namespace App\Modules\Councilor\App\Http\Livewire\Mandaties;

use App\Modules\Councilor\App\Models\Councilor;
use App\Modules\Councilor\App\Models\Legislaturie;
use App\Modules\Councilor\App\Models\MandateReason;
use App\Modules\Councilor\App\Models\Mandatie;
use SIGA\Form\Fields\Select;
use SIGA\Form\Fields\Status;
use SIGA\Form\Fields\Text;
use SIGA\Form\Fields\Textarea;
use SIGA\Form\FormComponent;

class EditComponent extends FormComponent
{

        protected $route = "mandaties";

        public function mount(Mandatie $mandaty)
        {

           $this->setFormProperties($mandaty);
        }

        /**
        * @return array
        */
        public function fields()
        {
            return [
                Select::make('councilor_id')->target(Councilor::query()),
                Select::make('legislatury_id')->target(Legislaturie::query()),
                Select::make('mandate_reason_id')->target(MandateReason::query()),
                Text::make('date_start')->type('date'),
                Text::make('date_end')->type('date'),
                Textarea::make('description'),
                Status::make('status')
            ];
        }
}
