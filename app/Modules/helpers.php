<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */

if ( ! function_exists('get_tenant_id'))
{
    /**
     * Get the configuration path.
     *
     * @param  string $path
     * @return string
     */
    function get_tenant_id($tenant = 'company_id')
    {
        $tenantId = \SIGA\Tenant\Facades\Tenant::getTenantId($tenant);
        return $tenantId;
    }
}

if ( ! function_exists('get_tenant'))
{
    /**
     * Get the configuration path.
     *
     * @param  string $path
     * @return string
     */
    function get_tenant()
    {
        return \App\Modules\Admin\App\Models\Company::find(get_tenant_id());
    }
}

if (!function_exists('is_active')){

    function is_active($route){
        return request()->routeIs($route) ? ' text-indigo-600 hover:text-indigo-500':' text-gray-500 hover:text-gray-900';
    }
}

if (!function_exists('view_admin')){

    function view_admin($view){
        return sprintf("admin::livewire.%s", $view);
    }
}
if (!function_exists('call_migration_generate_path')){

    function call_migration_generate_path($route){
        return $route;
    }
}
if ( ! function_exists('get_tenant_id'))
{
    /**
     * Get the configuration path.
     *
     * @param  string $path
     * @return string
     */
    function get_tenant_id($tenant = 'company_id')
    {
        $tenantId = \SIGA\Tenant\Facades\Tenant::getTenantId($tenant);
        return $tenantId;
    }
}

if ( ! function_exists('get_tenant'))
{
    /**
     * Get the configuration path.
     *
     * @param  string $path
     * @return string
     */
    function get_tenant()
    {
        return app('currentCompany');
    }
}

if ( ! function_exists('status'))
{
    /**
     * Get the configuration path.
     *
     * @param $key
     * @param string[] $options
     * @return string
     */
    function status($key, $options = ['draft','published'])
    {
        return $options[$key];
    }
}
