<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */

namespace App\Modules\Admin\App\Http\Livewire\Categories;

use App\Modules\Admin\App\Models\Category;
use SIGA\Form\Fields\Cover;
use SIGA\Form\Fields\Radio;
use SIGA\Form\Fields\Status;
use SIGA\Form\Fields\Text;
use SIGA\Form\FormComponent;

class CreateComponent extends FormComponent
{

        protected $route = "categories";


        public function mount(Category $category)
        {
           $this->setFormProperties($category);
        }

        /**
        * @return array
        */
        public function fields()
        {
            return [
                Text::make('name'),
                Cover::make('cover'),
                Status::make('status'),
            ];
        }
}
