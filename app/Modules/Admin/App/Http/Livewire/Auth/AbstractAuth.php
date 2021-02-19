<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */

namespace App\Modules\Admin\App\Http\Livewire\Auth;

use Livewire\Component;

class AbstractAuth extends Component
{


    public function getTenantProperty(){
        return app('currentCompany');
    }

    protected function pageConfig(){

        return [
                'page'=>[
                    'production' => false,
                    'baseUrl' => '',
                    'title' => 'Dashboard',
                    'description' => 'Dashboard template built with tailwindcss 🛩',
                    'collections' => [],
                ]
            ];
    }
}
