<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */

namespace App\Modules\Admin\App\Http\Livewire\Companies;

use SIGA\Form\Fields\Radio;
use SIGA\Form\Fields\Text;
use SIGA\Form\Fields\Textarea;
use SIGA\Form\FormComponent;
use Illuminate\Database\Eloquent\Builder;
use SIGA\Models\LandlordCompany;

class CreateComponent extends FormComponent
{

        protected $route = "companies";


        public function mount(LandlordCompany $model)
        {
           $this->model = $model;
        }

        /**
        * @return array
        */
        public function fields()
        {
            return [
                Text::make('Name'),
                Text::make('Domain'),
                Text::make('Sub Title', 'subtitle'),
                Text::make('Preview'),
                Text::make('Email'),
                Text::make('Cover'),
                Text::make('Whatsapp'),
                Text::make('Contact Url','contact_url'),
                Text::make('Prefix'),
                Text::make('Database'),
                Textarea::make('Description'),
                Text::make('Service Hours','service_hours'),
                Radio::make('Status')->options(['draft','published']),
            ];
        }
}
