<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */

namespace App\Modules\Councilor\App\Http\Livewire\Legislaturies;

use App\Modules\Councilor\App\Models\Legislaturie;
use SIGA\Table\TableComponent;
use Illuminate\Database\Eloquent\Builder;
use SIGA\Table\Views\Column;

class ListComponent extends TableComponent
{

    public function query(): Builder
    {
      return Legislaturie::query();
    }

    public function columns(): array
    {
       return [
           Column::make('name'),
           Column::make('mayor'),
           //
           Column::make('action')->actions($this->route())
       ];
    }

    public function layout(): string
    {
        return 'admin::layouts.admin';
    }

    public function route()
    {
        return "legislaturies";
    }
}
