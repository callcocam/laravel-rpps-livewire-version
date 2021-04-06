<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */
namespace App\Modules\Councilor\App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use SIGA\Models\AbstractModel;
use SIGA\Scopes\UuidGenerate;

class KindOfAct extends AbstractModel
{
    use HasFactory;

    protected $table = "kind_of_acts";

    protected $guarded = ['id'];

    public function councilor(){
        return $this->hasOne(Councilor::class);
    }
}
