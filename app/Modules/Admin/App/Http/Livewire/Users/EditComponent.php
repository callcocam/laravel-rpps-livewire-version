<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */

namespace App\Modules\Admin\App\Http\Livewire\Users;

use App\Models\User;
use SIGA\Form\Fields\Checkbox;
use SIGA\Form\Fields\Cover;
use SIGA\Form\Fields\Radio;
use SIGA\Form\Fields\Select;
use SIGA\Form\Fields\Text;
use SIGA\Form\Fields\Textarea;
use SIGA\Form\FormComponent;

class EditComponent extends FormComponent
{

        protected $route = "users";

        public function mount(User $user)
        {
           $this->setFormProperties($user);
        }

        /**
        * @return array
        */
        public function fields()
        {
            return [
                Text::make('Name'),
                Text::make('office'),
                Text::make('document'),
                Text::make('profession'),
                Radio::make('genre')->options(['masculino','femenino']),
                Text::make('date_birth')->type('date'),
                Text::make('nationality'),
                Cover::make('cover'),
                Radio::make('status')->options(['1'=>'Ativo','0'=>'Inativo']),
                Textarea::make('description'),

            ];
        }
}
