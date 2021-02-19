<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */

namespace App\Modules\Admin\App\Http\Livewire\Shared;

use App\Modules\Admin\App\Models\Menu;
use App\Modules\MenuBuilder\RenderFromDatabaseData;
use Livewire\Component;

class NavBuilder extends Component
{
    public function render()
    {

        return view('admin::livewire.shared.nav-builder');
    }

    public function renderDropdown($data){
        $html = [];
        if(array_key_exists('assets', $data) && $data['assets'] === 'dropdown'){
            $html[] = '<li class="c-sidebar-nav-dropdown">';
            $html[] = '<a class="c-sidebar-nav-dropdown-toggle" href="#">';
            if($data['hasIcon'] === true && $data['iconType'] === 'coreui'){
                $html[] = '<i class="' . $data['icon'] . ' c-sidebar-nav-icon"></i>';
            }
            $html[] = $data['name'] . '</a>';
            $html[] = '<ul class="c-sidebar-nav-dropdown-items">';
            $html[] = $this->renderDropdown( $data['elements'] );
            $html[] = '</ul></li>';
        }else{
            for($i = 0; $i < count($data); $i++){
                if( $data[$i]['assets'] === 'link' ){
                    $html[] = '<li class="c-sidebar-nav-item">';
                    $html[] = '<a class="c-sidebar-nav-link" href="' . url($data[$i]['href']) . '">';
                    $html[] = '<span class="c-sidebar-nav-icon"></span>' . $data[$i]['name'] . '</a></li>';
                }elseif( $data[$i]['assets'] === 'dropdown' ){
                    $html[] =$this->renderDropdown( $data[$i] );
                }
            }
        }
        return implode('', $html);
    }

    public function getAppMenusProperty(){
        $builder = app('currentCompany')->menus_admin;
        $rfd = new RenderFromDatabaseData();
        return $rfd->render($builder);
    }
}
