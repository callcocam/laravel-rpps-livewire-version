<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */
namespace App\Modules\Admin\App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use SIGA\Acl\Models\AbstractRole;
use SIGA\Concerns\UsesLandlordConnection;
use SIGA\Scopes\UuidGenerate;

class Role extends AbstractRole
{
    use HasFactory, UsesLandlordConnection, UuidGenerate;

    public $incrementing = false;

    protected $keyType = "string";
}
