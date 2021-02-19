<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */

namespace App\Modules\Admin\App\Http\Livewire\Roles;

use App\Modules\Admin\App\Models\Permission;
use App\Modules\Admin\App\Models\Role;
use SIGA\Form\Fields\MultiSelect;
use SIGA\Form\Fields\Select;
use SIGA\Form\Fields\Text;
use SIGA\Form\FormComponent;

class EditComponent extends FormComponent
{

    protected $route = "roles";

    public function mount(Role $role)
    {
        $role->append('access');
        $this->setFormProperties($role);
    }

    /**
     * @return array
     */
    public function fields()
    {

        return [
            Text::make('name'),
            Select::make('special')->options(['no-access' => 'no-access', 'all-access' => 'all-access', 'no-defined' => 'no-defined']),
            MultiSelect::make('access')
                ->target(Permission::query(), $this->isMultSelectSearch('access'))->inline()
        ];
    }

    public function success()
    {
        if ($result = parent::success()) {
            $this->model->permissions()->sync(array_keys($this->MultselectSelected));
        }

        return $result;
    }
}
