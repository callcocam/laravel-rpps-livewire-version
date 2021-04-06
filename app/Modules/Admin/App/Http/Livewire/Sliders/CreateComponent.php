<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */

namespace App\Modules\Admin\App\Http\Livewire\Sliders;


use App\Modules\Admin\App\Models\Slider;
use SIGA\Form\Fields\Cover;
use SIGA\Form\Fields\Status;
use SIGA\Form\Fields\Text;
use SIGA\Form\Fields\Textarea;
use SIGA\Form\FormComponent;

class CreateComponent extends FormComponent
{

        protected $route = "sliders";


        public function mount(Slider $slider)
        {
           $this->setFormProperties($slider);
        }

        /**
        * @return array
        */
        public function fields()
        {
            return [
                Text::make('name'),
                Text::make('preview'),
                Text::make('width'),
                Cover::make('cover'),
                Textarea::make('description'),
                Status::make('status'),
            ];
        }
}
