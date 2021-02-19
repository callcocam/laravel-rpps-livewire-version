<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */

namespace App\Modules\Admin\App\Http\Livewire\Companies;

use SIGA\Form\Fields\CKEditor;
use SIGA\Form\Fields\Cover;
use SIGA\Form\Fields\Radio;
use SIGA\Form\Fields\Text;
use SIGA\Form\FormComponent;
use SIGA\Models\LandlordCompany;

class EditComponent extends FormComponent
{

        protected $route = "companies";

        public function mount(LandlordCompany $company)
        {
           $this->setFormProperties($company);

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
                Cover::make('Cover'),
                Text::make('Whatsapp'),
                Text::make('Contact Url','contact_url'),
                Text::make('Prefix'),
                Text::make('Database'),
                CKEditor::make('Description'),
                Text::make('Service Hours','service_hours'),
                Radio::make('Status')->options(['draft','published']),
            ];
        }


    /**
     * @return string
     */
    public function formView()
    {
        return 'laravel-livewire-forms::company';
    }
}
