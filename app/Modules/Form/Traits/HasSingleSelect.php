<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */

namespace SIGA\Form\Traits;


use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use SIGA\Form\Fields\Select;

trait HasSingleSelect
{
    public $SingleselectSearch;
    public $SingleselectSelected;


    public function setSingleSelectValue($value, $label, $attribute)
    {
        $attribute = Str::afterLast($attribute, '.');
        if (Arr::has($this->SingleselectSelected, $attribute) && Arr::get($this->SingleselectSelected, $attribute) == $label) {
            Arr::forget($this->SingleselectSelected, $attribute);
            Arr::set($this->form_data, $attribute, "");
        } else {
            Arr::set($this->SingleselectSelected, $attribute, $label);
            Arr::set($this->form_data, $attribute, $value);
        }
        $this->clearSingleSelectSearch($attribute);

    }

    public function removeSingleSelect($attribute)
    {
        $attribute = Str::afterLast($attribute, '.');
        Arr::forget($this->SingleselectSelected, $attribute);
        Arr::set($this->form_data, $attribute, "");
    }

    public function getSingleValueOptionsProperty()
    {
        return $this->SingleselectSelected;
    }

    public function isSingleSelected($value, $attribute)
    {
        $attribute = Str::afterLast($attribute, '.');
        return isset($this->form_data[$attribute]) && $this->form_data[$attribute] == $value ? 'c-multi-selected' : '';
    }

    protected function clearSingleSelectSearch($field)
    {
        if ($this->SingleselectSearch) {
            Arr::forget($this->SingleselectSearch, $field);
        }
    }

    protected function isSingleSelectSearch($field)
    {
        if ($this->SingleselectSearch && Arr::exists($this->SingleselectSearch, $field)) {
            return trim($this->SingleselectSearch[$field]);
        }
        return false;
    }

    protected function hydrateSelect(&$model, &$field)
    {
        if ($field instanceof Select) {
            if ($model->{$field->name}) {
                if (isset($field->options[$model->{$field->name}])) {
                    $this->SingleselectSelected[$field->name] = $field->options[$model->{$field->name}];
                }
            }
        }
    }
}
