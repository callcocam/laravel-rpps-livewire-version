<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */
namespace App\Modules\Admin\App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use SIGA\Models\AbstractModel;

class SubMenu extends AbstractModel
{
    use HasFactory;

    protected $guarded = ['id'];

    public function submenus(){
        return $this->hasMany(SubMenu::class, 'parent');
    }


    protected  function slugTo()
    {
        return false;
    }
}
