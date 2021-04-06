<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */

namespace App\Modules\Councilor\App\Http\Livewire\Users;


use App\Modules\Councilor\App\Models\Councilor;
use SIGA\Form\Fields\Cover;
use SIGA\Form\Fields\Radio;
use SIGA\Form\Fields\Text;
use SIGA\Form\Fields\Textarea;
use SIGA\Form\FormComponent;

class CreateComponent extends FormComponent
{

        protected $route = "councilors";


        public function mount(Councilor $councilor)
        {
           $this->setFormProperties($councilor);
        }

        /**
        * @return array
        */
        public function fields()
        {
            return [
                Text::make('Name')->rules('required'),
                Text::make('email')->rules('required'),
                Text::make('office'),
                Text::make('document'),
                Text::make('profession'),
                Text::make('vereador_old_id'),
                Radio::make('status')->options(['1'=>'Ativo','0'=>'Inativo']),
                Radio::make('genre')->options(['MASCULINO','FEMININO']),
                Text::make('date_birth')->type('date'),
                Text::make('nationality'),
                Cover::make('cover'),
                Textarea::make('description'),
            ];
        }
}
