<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */

namespace App\Modules\Councilor\App\Http\Livewire\CurrentAffiliations;

use App\Modules\Councilor\App\Models\CurrentAffiliation;
use SIGA\Table\TableComponent;
use Illuminate\Database\Eloquent\Builder;
use SIGA\Table\Views\Column;

class ListComponent extends TableComponent
{

    public function query(): Builder
    {
      return CurrentAffiliation::query();
    }

    public function columns(): array
    {
       return [
           Column::make('Aliliação')->format(function ($model){
               return $model->affiliation->name;
           }),
           Column::make('Vereador')->format(function ($model){
               return $model->councilor->name;
           }),
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
        return "currentaffiliations";
    }
}
