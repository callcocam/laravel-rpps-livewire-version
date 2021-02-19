<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */

namespace SIGA\Table\Views\Traits;


trait HasTypes
{

    public function status()
    {
        return $this->format(function ($model, $column) {
            return view($this->views_include_table('status'), [
                'model' => $model,
                'column' => $column,
            ]);
        });
    }

    public function getStatusClass($value){
        return config(sprintf('laravel-livewire-tables.status.%s',$value),"bg-red-100 text-green-800");
    }

    public function actions($route, $permission=null)
    {
        if(is_null($permission))
            $permission = sprintf('admin.%s.index', $route);

        return $this->format(function ($model, $column) use ($route) {
            return view($this->views_include_table('actions'), [
                'route' => $route,
                'model' => $model,
                'column' => $column,
            ]);
        });//->hideIf(auth()->user()->cannot($permission));
    }
}
