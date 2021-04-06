<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */

namespace App\Modules\Councilor\App\Http\Livewire\BoardOfDirectors;

use App\Modules\Councilor\App\Models\BoardOfDirector;
use App\Modules\Councilor\App\Models\CommissionType;
use App\Modules\Councilor\App\Models\Councilor;
use App\Modules\Councilor\App\Models\Legislaturie;
use SIGA\Form\Fields\Select;
use SIGA\Form\Fields\Status;
use SIGA\Form\Fields\Text;
use SIGA\Form\Fields\Textarea;
use SIGA\Form\FormComponent;

class EditComponent extends FormComponent
{

        protected $route = "boardofdirectors";

        public function mount(BoardOfDirector $boardofdirector)
        {
           $this->setFormProperties($boardofdirector);
        }

        /**
        * @return array
        */
        public function fields()
        {
            return [
                Select::make('commission_type_id')->target(CommissionType::query()),
                Select::make('president_id')->target(Councilor::query()->where('assets','councilors')),
                Select::make('first_secretary_id')->target(Councilor::query()->where('assets','councilors')),
                Select::make('last_secretary_id')->target(Councilor::query()->where('assets','councilors')),
                Select::make('member_id')->target(Councilor::query()->where('assets','councilors')),
                Select::make('legislatury_id')->target(Legislaturie::query()),
                Text::make('date_start')->type('date'),
                Text::make('date_end')->type('date'),
                Textarea::make('description'),
                Status::make('status'),
            ];
        }
}
