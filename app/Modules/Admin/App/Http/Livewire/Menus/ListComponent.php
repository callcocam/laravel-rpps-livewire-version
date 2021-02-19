<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */

namespace App\Modules\Admin\App\Http\Livewire\Menus;

use SIGA\Models\LandlordMenu;
use SIGA\Table\TableComponent;
use Illuminate\Database\Eloquent\Builder;
use SIGA\Table\Views\Column;

class ListComponent extends TableComponent
{

    public function query(): Builder
    {
        return LandlordMenu::query();
    }

    public function columns(): array
    {
       return [
           Column::make('name')->sortable()->searchable(),
           Column::make('slug'),
           Column::make('action')->actions('menus')
       ];
    }

    public function layout(): string
    {
        return 'admin::layouts.landlord';
    }

    public function route()
    {
        return "menus";
    }
}
