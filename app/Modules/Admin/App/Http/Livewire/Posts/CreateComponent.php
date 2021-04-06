<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */

namespace App\Modules\Admin\App\Http\Livewire\Posts;

use App\Modules\Admin\App\Models\Post;
use SIGA\Form\FormComponent;

class CreateComponent extends FormComponent
{

        protected $route = "posts";


        public function mount(Post $post)
        {
           $this->setFormProperties($post);
        }

        /**
        * @return array
        */
        public function fields()
        {
            return [];
        }
}
