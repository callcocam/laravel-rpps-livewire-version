<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */

namespace App\Modules\Councilor\App\Http\Livewire\CommissionTypes;

use App\Modules\Councilor\App\Models\CommissionType;
use SIGA\Form\Fields\Status;
use SIGA\Form\Fields\Text;
use SIGA\Form\Fields\Textarea;
use SIGA\Form\FormComponent;

class CreateComponent extends FormComponent
{

        protected $route = "commissiontypes";


        public function mount(CommissionType $commissiontype)
        {
           $this->setFormProperties($commissiontype);
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
