<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */

namespace App\Modules\Admin\App\Http\Livewire\Users;

use App\Models\User;
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
            return [];
        }
}
