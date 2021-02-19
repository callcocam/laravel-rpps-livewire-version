<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */

namespace SIGA\Form;

use Illuminate\Support\Str;
use SIGA\Form\Fields\CKEditor;
use SIGA\Form\Fields\MultiSelect;
use SIGA\Form\Fields\Select;
use SIGA\Form\Traits\Elements;
use SIGA\Form\Traits\FollowsRules;
use SIGA\Form\Traits\HandlesArrays;
use SIGA\Form\Traits\HasMultiSelect;
use SIGA\Form\Traits\HasSingleSelect;
use SIGA\Form\Traits\UploadsFiles;
use Illuminate\Support\Arr;
use Livewire\Component;

class FormComponent extends Component
{
    use FollowsRules, UploadsFiles, HandlesArrays, Elements, HasMultiSelect, HasSingleSelect;

    public $model;
    public $form_data;
    public $files;
    private static $storage_disk;
    private static $storage_path;

    public $search = "test";
    protected $route;

    /**
     * @var string[]
     */
    protected $listeners = ['fileUpdate', 'input'];
    /**
     * @var mixed
     */

    public function layout(): string
    {
        return sprintf('admin::layouts.%s', app('currentCompany')->prefix);
    }

    public function input($data)
    {
        $this->form_data[$data['field']] = $data['value'];
    }


    /**
     * @param null $model
     * @param null $callback
     */
    public function setFormProperties($model = null, $callback = null)
    {
        $this->model = $model;

        if ($callback) {
            $callback();
        }
        if ($model) {
            $this->form_data = $model->toArray();
        }
        foreach ($this->fields() as $field):
            if (!isset($this->form_data[$field->name])):
                $array = in_array($field->type, ['checkbox', 'file']);
                if (in_array($field->type, ['file'])) {
                    if ($this->form_data[$field->name] = $model->{$field->name}) {
                        $this->form_data[$field->name] = $model->{$field->name}->file;
                    }
                } elseif ($field instanceof Select) {
                    $this->SingleselectSelected[$field->name] = $field->default;
                    $this->form_data[$field->name] = $field->default;
                } elseif ($field instanceof MultiSelect) {
                    $this->MultselectSelected[$field->name] = $field->default;
                    $this->form_data[$field->name] = $field->default;
                } elseif ($field instanceof CKEditor) {
                    $this->ckcontent = $field->default;
                    $this->form_data[$field->name] = $field->default;
                } else {
                    $this->form_data[$field->name] = $field->default ?? ($array ? [] : null);
                }
            else:
               $this->hydrateSelect($model, $field);
               $this->hydrateMultiSelect($model, $field);
            endif;
        endforeach;
    }

    /**
     * @return mixed
     */
    public function render()
    {

        $ThemeConfig['themeConfig'] = [];
        $fields = $this->elements();
        return view($this->formView())
            ->with('fields', $fields)
            ->with($fields)
            ->layout($this->layout(), $ThemeConfig);
    }

    /**
     * @return string
     */
    public function formView()
    {
        return 'laravel-livewire-forms::form';
    }

    /**
     * @return array
     */
    public function fields()
    {
        return [];
    }

    /**
     * @param $field
     * @throws \Illuminate\Validation\ValidationException
     */
    public function updated($field)
    {
        if ($this->rules())
            $this->validateOnly($field, $this->rules());
    }

    public function submit()
    {
        if ($this->rules())
            $this->validate($this->rules());
        $field_names = [];
        foreach ($this->fields() as $field) $field_names[] = $field->name;
        $this->form_data = Arr::only($this->form_data, $field_names);
        return $this->success();
    }

    public function success()
    {

        if ($this->model->exists) {
            try {
                $this->model->update($this->form_data);
                flash('Dados atualizados com sucesso', 'success')->dismissable()->livewire($this);
                return true;
            } catch (\PDOException $PDOException) {
                flash($PDOException->getMessage(), 'danger')->dismissable()->livewire($this);
                return false;
            }
        } else {
            try {
                $this->model = $this->model->create($this->form_data);
                flash('Dados cadastrados com sucesso', 'success')->dismissable()->livewire($this);
                return true;
            } catch (\PDOException $PDOException) {
                flash($PDOException->getMessage(), 'danger')->dismissable()->livewire($this);
                return false;
            }

        }

    }

    public function errorMessage($message)
    {

        return str_replace('form data.', '', $message);
    }

    /**
     * Salvar e ir para outra view
     */
    public function saveAndStay()
    {
        $this->submit();
    }

    /**
     * Salvar e ir para outra view
     */
    public function saveAndEditStay()
    {
        if ($this->submit())
            $this->saveAndStayResponse();
    }

    /**
     * @return \Illuminate\Http\RedirectResponse
     */
    public function saveAndStayResponse()
    {
        return redirect()->route(sprintf('admin.%s.edit', $this->route), array_merge(
            [$this->getRouteKeyName() => $this->model], request()->query()
        ));
    }

    /**
     *
     */
    public function saveAndGoBack()
    {
        if ($this->submit()) {
            $this->saveAndGoBackResponse();
        }

    }

    /**
     * @return \Illuminate\Http\RedirectResponse
     */
    public function saveAndGoBackResponse()
    {
        return redirect()->route(sprintf("admin.%s.index", $this->route));
    }


    public function getRouteKeyName()
    {
        return Str::singular(Str::replaceFirst('-', '', $this->route));
    }

}
