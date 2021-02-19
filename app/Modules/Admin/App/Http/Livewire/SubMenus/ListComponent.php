<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */

namespace App\Modules\Admin\App\Http\Livewire\SubMenus;

use SIGA\Models\LandlordSubMenu;
use SIGA\Table\TableComponent;
use Illuminate\Database\Eloquent\Builder;
use SIGA\Table\Views\Column;

class ListComponent extends TableComponent
{

    public function query(): Builder
    {
        return LandlordSubMenu::query();
    }

    public function columns(): array
    {

       return [
           Column::make('Name')->sortable()->searchable(),
           Column::make('slug')->sortable()->searchable(),
           Column::make('Menu','sub_menu_id')->format(function ($model){
               if($model->sub_menu){
                   return $model->sub_menu->name;
               }
           }),
           Column::make('action')->actions('sub-menus')
       ];
    }

    public function layout(): string
    {
        return 'admin::layouts.landlord';
    }

    public function route()
    {
        return "sub-menus";
    }
}
