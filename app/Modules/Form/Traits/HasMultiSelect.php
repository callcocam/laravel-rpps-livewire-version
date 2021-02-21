<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */

namespace SIGA\Form\Traits;


use Illuminate\Support\Arr;
use Illuminate\Support\Collection;
use SIGA\Form\Fields\MultiSelect;

trait HasMultiSelect
{
    public $MultselectSearch;
    public $MultselectSelected = [];


    public function setMultSelectValue($value, $label, $attribute)
    {

        if (Arr::exists($this->MultselectSelected, $value)) {

            Arr::forget($this->MultselectSelected, $value);
        } else {

            $this->MultselectSelected[$value] = $label;
        }
        $this->form_data[$attribute] = $this->MultselectSelected;
    }

    public function removeMutSelect($value, $attribute)
    {
        if (Arr::exists($this->MultselectSelected, $value)) {

            Arr::forget($this->MultselectSelected, $value);
        }
        $this->form_data[$attribute] = $this->MultselectSelected;
    }

    public function getValueOptionsProperty()
    {
        return $this->MultselectSelected;
    }

    public function isSelected($value)
    {
        return Arr::exists($this->MultselectSelected, $value) ? 'c-multi-selected' : '';
    }

    public function getValueOptionsCountProperty()
    {
        return count($this->MultselectSelected);
    }

    protected function clearMultSelectSearch($field)
    {

        if ($this->MultselectSearch && $this->MultselectSearch['form_data']) {
            Arr::forget($this->MultselectSearch, $field);
        }
    }

    protected function isMultSelectSearch($field)
    {

        if ($this->MultselectSearch && Arr::exists($this->MultselectSearch, $field)) {
            return trim($this->MultselectSearch[$field]);
        }
        return false;
    }

    protected function hydrateMultiSelect(&$model, &$field)
    {
        if ($field instanceof MultiSelect) {
            $options = $model->{$field->name};
            if ($options instanceof Collection) {
                $options = $options->toArray();
            }
            $this->MultselectSelected = $options;
            $this->form_data[$field->name] = $options;
        }
    }
}
