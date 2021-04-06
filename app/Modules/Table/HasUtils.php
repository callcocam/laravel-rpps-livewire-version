<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */

namespace SIGA\Table;


use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;

trait HasUtils
{

    public function views_table($view): string
    {
        return sprintf('laravel-livewire-tables::%s.%s', config('laravel-livewire-tables.theme'), $view);
    }

    public function views_include_table($view): string
    {
        return $this->views_table(sprintf(".includes.%s", $view));
    }

    public function actionLink($model, $action)
    {
        if ($this->permission($action)) {
            if (Route::has(sprintf('%s-admin-%s', $this->route(), $action))) {
                return route(sprintf('%s-admin-%s', $this->route(), $action), array_merge(
                    [$this->getRouteKeyName() => $model], request()->query()
                ));
            }
        }
        return null;
    }


    public function createLink()
    {
       return view(table_includes($this->create_view_button()))->with('route', sprintf('%s-admin-create', $this->route()));

    }

    public function reloadLink()
    {
        return view(table_includes($this->reload_view_button()))->with('route', sprintf('%s-admin-stores', $this->route()));
    }

    public function permission($action)
    {
        return sprintf('%s-admin-%s', $this->route(), $action);
    }

    public function getRouteKeyName()
    {
        return Str::singular(Str::replaceFirst('-', '', $this->route()));
    }

    protected function create_view_button()
    {
       return 'actions.create';
    }

    protected function reload_view_button()
    {
        return 'actions.reload';
    }

}
