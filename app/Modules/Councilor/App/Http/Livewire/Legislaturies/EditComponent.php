<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */

namespace App\Modules\Councilor\App\Http\Livewire\Legislaturies;

use App\Modules\Councilor\App\Models\Legislaturie;
use SIGA\Form\Fields\Status;
use SIGA\Form\Fields\Text;
use SIGA\Form\Fields\Textarea;
use SIGA\Form\FormComponent;

class EditComponent extends FormComponent
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
            return [

                Text::make('name'),
                Text::make('mayor'),
                Text::make('vice_mayor'),
                Text::make('start_date')->type('date'),
                Text::make('end_date')->type('date'),
                Textarea::make('description'),
                Status::make('status'),
            ];
        }
}
