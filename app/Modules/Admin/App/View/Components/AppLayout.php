<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */

namespace App\Modules\Admin\App\View\Components;


use Illuminate\View\Component;

class AppLayout extends Component
{

    public function render()
    {

        return view('admin::layouts.app');
    }
}
