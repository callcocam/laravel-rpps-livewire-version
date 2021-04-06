<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */

namespace App\Modules\Admin\App\Http\Livewire\Posts;

use App\Modules\Admin\App\Models\Category;
use App\Modules\Admin\App\Models\Post;
use SIGA\Form\Fields\CKEditor;
use SIGA\Form\Fields\Cover;
use SIGA\Form\Fields\Radio;
use SIGA\Form\Fields\Select;
use SIGA\Form\Fields\Text;
use SIGA\Form\Fields\Textarea;
use SIGA\Form\FormComponent;

class EditComponent extends FormComponent
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
            return [
                Select::make('category_id')->target(Category::query()),
                Text::make('name'),
                Text::make('subtitle'),
                Text::make('video'),
                Cover::make('cover'),
                Radio::make('assets')->options(['noticies','posts'], true),
                CKEditor::make('description'),
            ];
        }
}
