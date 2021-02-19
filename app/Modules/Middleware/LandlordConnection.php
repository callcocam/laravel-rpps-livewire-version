<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */

namespace SIGA\Middleware;


use App\Models\LandlordUser;
use Illuminate\Http\Request;

class LandlordConnection
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, \Closure $next)
    {
        if(config('multitenancy.app_url_tenant') == request()->getHost()){
            config([
                'auth.providers.users.model' => config('multitenancy.landlord_model_user', LandlordUser::class),
            ]);
        }

        return $next($request);
    }
}
