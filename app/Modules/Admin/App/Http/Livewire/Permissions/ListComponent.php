<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */

namespace App\Modules\Admin\App\Http\Livewire\Permissions;

use App\Modules\Admin\App\Models\Permission;
use SIGA\Table\TableComponent;
use Illuminate\Database\Eloquent\Builder;
use SIGA\Table\Views\Column;

class ListComponent extends TableComponent
{

    public function query(): Builder
    {
      return Permission::query();
    }

    public function columns(): array
    {
       return [
           Column::make('name')->searchable()->sortable()
       ];
    }

    public function layout(): string
    {
        return 'admin::layouts.landlord';
    }

    public function route()
    {
        return "permissions";
    }
}
