<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */

namespace App\Modules\Admin\App\Models;


use SIGA\Models\AbstractModel;

class Company extends AbstractModel
{

    public function submenus(){
        return $this->hasMany(SubMenu::class);
    }

    public function menus(){
        return $this->hasMany(Menu::class)
            ->where('status','1');
    }


    public function menus_admin(){
        return $this->hasOne(Menu::class)
            ->where('name','menusAdmin')
            ->where('status','1');
    }
}
