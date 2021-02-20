<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */

namespace App\Modules\Admin\App\Http\Livewire\Roles;

use App\Modules\Admin\App\Models\Role;
use SIGA\Table\TableComponent;
use Illuminate\Database\Eloquent\Builder;
use SIGA\Table\Views\Column;

class ListComponent extends TableComponent
{


    public function query(): Builder
    {
       return Role::query();
    }

    public function columns(): array
    {
       return [
           Column::make('name')->sortable()->searchable(),
           Column::make('action')->actions('roles')

       ];
    }

    public function layout(): string
    {
        return 'admin::layouts.admin';
    }

    public function route()
    {
        return "roles";
    }
}
