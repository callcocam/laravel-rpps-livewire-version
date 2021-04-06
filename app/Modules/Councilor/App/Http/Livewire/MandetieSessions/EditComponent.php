<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */

namespace App\Modules\Councilor\App\Http\Livewire\MandetieSessions;

use App\Modules\Councilor\App\Models\MandetieSession;
use SIGA\Form\Fields\Cover;
use SIGA\Form\Fields\Select;
use SIGA\Form\Fields\Status;
use SIGA\Form\Fields\Text;
use SIGA\Form\Fields\Textarea;
use SIGA\Form\FormComponent;

class EditComponent extends FormComponent
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
            return [
                Text::make('name'),
                Select::make('type')->options([
                    "Ordinária" => "Ordinária",
                    "Extraordinária" => "Extraordinária",
                    "Solene" => "Solene",
                ]),
                Text::make('session_date')->type('date'),
                Cover::make('pauta_session'),
                Cover::make('ata_session'),
                Cover::make('vote_result'),
                Cover::make('list_process'),
                Status::make('status'),
                Textarea::make('description'),
            ];
        }
}
