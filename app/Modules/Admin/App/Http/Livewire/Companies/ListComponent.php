<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */

namespace App\Modules\Admin\App\Http\Livewire\Companies;

use SIGA\Models\LandlordCompany;
use SIGA\Table\TableComponent;
use Illuminate\Database\Eloquent\Builder;
use SIGA\Table\Views\Column;

class ListComponent extends TableComponent
{

    public function query(): Builder
    {
        return LandlordCompany::query();
    }

    public function columns(): array
    {
        return [
            Column::make('name')->sortable()->searchable(),
            Column::make('email')->sortable()->searchable()
                ->format(function (LandlordCompany $model) {
                    return $this->mailto($model->email, null, ['target' => '_blank']);
                }),
            Column::make('cover')
                ->format(function(LandlordCompany $model) {
                    return $this->image($model->cover, $model->name, ['class' => 'img-fluid img-thumbnail w-25']);
                }),
            Column::make('#')->actions('companies')
        ];
    }

    public function layout(): string
    {
        return 'admin::layouts.landlord';
    }

    public function route()
    {
        return "companies";
    }
}
