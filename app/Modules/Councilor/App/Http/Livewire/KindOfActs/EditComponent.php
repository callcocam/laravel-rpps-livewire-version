<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */

namespace App\Modules\Councilor\App\Http\Livewire\KindOfActs;


use App\Modules\Councilor\App\Models\Councilor;
use App\Modules\Councilor\App\Models\KindOfAct;
use SIGA\Form\Fields\Select;
use SIGA\Form\Fields\Status;
use SIGA\Form\Fields\Textarea;
use SIGA\Form\FormComponent;

class EditComponent extends FormComponent
{

        protected $route = "kindofacts";

        public function mount(KindOfAct $kindofact)
        {
           $this->setFormProperties($kindofact);
        }

        /**
        * @return array
        */
        public function fields()
        {
            return [
                Select::make('councilor_id')->target(Councilor::query()->where('assets','councilors')),
                Textarea::make('description'),
                Status::make('status')
            ];
        }
}
