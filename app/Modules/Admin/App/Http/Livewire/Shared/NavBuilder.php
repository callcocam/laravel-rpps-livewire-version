<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */

namespace App\Modules\Admin\App\Http\Livewire\Shared;

use App\Modules\Admin\App\Models\Menu;
use App\Modules\MenuBuilder\RenderFromDatabaseData;
use Livewire\Component;

class NavBuilder extends Component
{

    protected $listeners = ['loadMenus'];

    protected $menus = [];

    public function mount(){
        $this->loadMenus();
    }
    public function render()
    {

        return view('admin::livewire.shared.nav-builder');
    }

    public function loadMenus(){
        $builder = app('currentCompany')->menus_admin;
        $rfd = new RenderFromDatabaseData();
        $this->menus = $rfd->render($builder);
    }
    public function getAppMenusProperty(){
       return $this->menus;
    }
}
