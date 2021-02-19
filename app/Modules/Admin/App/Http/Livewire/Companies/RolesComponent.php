<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */

namespace App\Modules\Admin\App\Http\Livewire\Companies;


use App\Models\TenantUser;
use Livewire\Component;
use SIGA\Models\LandlordCompany;
use SIGA\Tenant\Facades\Tenant;

class RolesComponent extends Component
{
    public $company;

    public function mount(LandlordCompany $company){
        $this->company = $company;
    }

    public function render(){

        return view(view_admin('companies.roles-component'));
    }

    public function getRolesProperty(){
        $users = TenantUser::query()->where('company_id',$this->company->company_id)->get();

       return $users;
    }
}
