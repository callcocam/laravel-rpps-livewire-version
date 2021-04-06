<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */
namespace SIGA\Livewire;

use Livewire\Component;

abstract class AbstractComponent extends Component
{

    protected function optionns(){
        return [
            'production' => false,
            'baseUrl' => '',
            'title' => 'Dashboard',
            'description' => 'Dashboard template built with tailwindcss 🛩',
            'collections' => [],
        ];
    }
    abstract protected function view();

    public function render()
    {
         $page = $this->optionns();
         return view($this->view())->layout('admin::layouts.admin',compact('page'));
    }
}
