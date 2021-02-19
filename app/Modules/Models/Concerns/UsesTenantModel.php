<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */

namespace SIGA\Models\Concerns;


trait UsesTenantModel
{
    public function getTenantModel()
    {
        $tenantModelClass = config('multitenancy.tenant_model');

        return new $tenantModelClass;
    }
}
