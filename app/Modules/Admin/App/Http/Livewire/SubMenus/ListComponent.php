<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */

namespace App\Modules\Admin\App\Http\Livewire\SubMenus;

use App\Modules\Admin\App\Models\SubMenu;
use SIGA\Table\TableComponent;
use Illuminate\Database\Eloquent\Builder;
use SIGA\Table\Views\Column;

class ListComponent extends TableComponent
{

    public function query(): Builder
    {
        return SubMenu::query();
    }

    public function columns(): array
    {

       return [
           Column::make('Name')->sortable()->searchable(),
           Column::make('slug')->sortable()->searchable(),
           Column::make('Menu','parent')->format(function ($model){
               if($model->submenu){
                   return $model->submenu->name;
               }
           }),
           Column::make('action')->actions('sub-menus')
       ];
    }

    public function layout(): string
    {
        return 'admin::layouts.admin';
    }

    public function route()
    {
        return "sub-menus";
    }
}
