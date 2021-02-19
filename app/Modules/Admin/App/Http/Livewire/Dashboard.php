<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */

namespace App\Modules\Admin\App\Http\Livewire;

use Livewire\Component;

class Dashboard extends Component
{
    public function render()
    {
        return view('admin::livewire.dashboard')->layout($this->layout());
    }



    public function layout(): string
    {
        return 'admin::layouts.admin';
    }
}
