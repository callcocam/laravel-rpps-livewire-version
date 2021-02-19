<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */

namespace SIGA\Tenant;

use App\Modules\Admin\App\Models\Company;
use Illuminate\Support\ServiceProvider;
use SIGA\Tenant\Facades\Tenant;

class TenantServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application events.
     *
     * @return void
     */
    public function boot()
    {

        if (!$this->app->runningInConsole()) {
            $company = Company::query()->where('assets', request()->getHost())->first();

            $this->company($company);
        }

    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(TenantManager::class, function () {
            return new TenantManager();
        });
    }


    public function company($company)
    {
        if (!$company):

            die(response("Nenhuma empresa cadastrada com esse endereço " . str_replace("admin.", "", request()->getHost()), 401));

        endif;

        $containerKey = config('tenant.default_tenant_key');

        app()->forgetInstance($containerKey);

        app()->instance($containerKey, $company);

        Tenant::addTenant("company_id", $company->id);

       // $this->tenant($company);
    }


}
