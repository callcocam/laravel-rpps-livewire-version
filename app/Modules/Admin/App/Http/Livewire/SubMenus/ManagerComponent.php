<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */

namespace App\Modules\Admin\App\Http\Livewire\SubMenus;


use App\Modules\Admin\App\Models\SubMenu;
use Livewire\Component;

class ManagerComponent extends Component
{

    public $newGroupLabel;
    public $name;
    protected $groups;
    protected $submenus;

    public function mount()
    {

        $this->load();
    }

    public function render()
    {
        return view('admin::livewire.sub-menus.manager-component')->layout($this->layout());
    }


    public function layout(): string
    {
        return sprintf('admin::layouts.%s', app('currentCompany')->prefix);
    }

    public function getGroupsProperty()
    {
        return $this->groups;
    }

    public function removeGroup($menu)
    {
    }

    public function removeSubMenu($menu)
    {
    }

    public function addTask($menu, $submenu)
    {
    }

    public function addGroup()
    {
    }

    public function updateGroupOrder($ordereds)
    {
        if ($ordereds) {
            foreach ($ordereds as $ordered) {
                $submenu = SubMenu::find($ordered['value']);
                $submenu->ordering = $ordered['order'];
                $submenu->save();
            }
        }
        $this->load();
    }

    protected function load()
    {
        $this->groups = SubMenu::query()
            ->orderby('ordering')
            ->orderby('name')->whereNull('sub_menu_id')->where('status', 1)->get();
    }
}
