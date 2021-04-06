<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */

namespace App\Modules\Admin\App\Http\Livewire\Utils;

use App\Modules\Helpers\IconsHelper;
use SIGA\Livewire\AbstractComponent;

class Icons extends AbstractComponent
{
    public $search;

    public function view()
    {
         return 'admin::livewire.utils.icons';
    }

    public function getIconsProperty()
    {
         return IconsHelper::make()->collect($this->search);
    }

}
