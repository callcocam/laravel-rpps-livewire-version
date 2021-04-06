<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */

namespace App\Modules\Councilor\App\Http\Livewire\CurrentAffiliations;

use App\Modules\Councilor\App\Models\Affiliation;
use App\Modules\Councilor\App\Models\Councilor;
use App\Modules\Councilor\App\Models\CurrentAffiliation;
use SIGA\Form\Fields\Select;
use SIGA\Form\FormComponent;

class CreateComponent extends FormComponent
{

        protected $route = "currentaffiliations";


        public function mount(CurrentAffiliation $currentaffiliation)
        {
           $this->setFormProperties($currentaffiliation);
        }

        /**
        * @return array
        */
        public function fields()
        {
            return [
                Select::make('councilor_id')->target(Councilor::query()->where('assets','councilors')),
                Select::make('affiliation_id')->target(Affiliation::query())
            ];
        }
}
