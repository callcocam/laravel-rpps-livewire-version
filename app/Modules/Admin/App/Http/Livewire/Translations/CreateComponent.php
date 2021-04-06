<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */

namespace App\Modules\Admin\App\Http\Livewire\Translations;

use App\Models\Translation;
use SIGA\Form\Fields\Text;
use SIGA\Form\Fields\Textarea;
use SIGA\Form\FormComponent;

class CreateComponent extends FormComponent
{

        protected $route = "translations";


        public function mount(Translation $translation)
        {
           $this->setFormProperties($translation);
        }

        /**
        * @return array
        */
        public function fields()
        {
            return [
                Text::make('group')->default($this->route),
                Text::make('name'),
                Textarea::make('description'),
            ];
        }
}
