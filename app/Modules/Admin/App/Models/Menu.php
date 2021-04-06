<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */

namespace App\Modules\Admin\App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use SIGA\Models\AbstractModel;

class Menu extends AbstractModel
{
    use HasFactory;

    public function submenus()
    {
        return $this->hasMany(SubMenu::class);
    }
}
