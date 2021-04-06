<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */

namespace SIGA\Table\Traits;

use SIGA\Styles;

use Illuminate\Support\Arr;
/**
 * Trait Table.
 */
trait Table
{
     /**
     * Whether or not to display the table header.
     *
     * @var bool
     */
    public $theme = 'tailwind';

    /**
     * Whether or not to display the table header.
     *
     * @var bool
     */
    public $tableHeaderEnabled = true;

    /**
     * Whether or not to display the table footer.
     *
     * @var bool
     */
    public $tableFooterEnabled = false;

    /**
     * The class to set on the table.
     *
     * @var string
     */
    public $tableClass = 'table align-items-center table-flush';


    /**
     * The class to set on the thead of the table.
     *
     * @var string
     */
    public $tableHeaderClass = 'thead-light';

    /**
     * The class to set on the tfoot of the table.
     *
     * @var string
     */
    public $tableFooterClass = '';

    /**
     * false is off
     * string is the tables wrapping div class.
     *
     * @var bool
     */
    public $responsive = 'table-responsive';

    /**
     * @param $attribute
     *
     * @return string|null
     */
    public function setTableHeadClass($attribute): ?string
    {
        return config(sprintf('laravel-livewire-tables.%s.classes.th', $this->theme),null);
    }

    /**
     * @param $attribute
     *
     * @return string|null
     */
    public function setTableHeadId($attribute): ?string
    {
        return $attribute;
    }

    /**
     * @param $attribute
     *
     * @return array|null
     */
    public function setTableHeadAttributes($attribute): array
    {
        $attributes['id'] = $this->setTableHeadId($attribute);
        $attributes['class'] = $this->setTableHeadClass($attribute);
        return array_filter($attributes);
    }

    /**
     * @param $model
     *
     * @return string|null
     */
    public function setTableRowClass($model): ?string
    {
        return config(sprintf('laravel-livewire-tables.%s.classes.tr', $this->theme),null);
    }

    /**
     * @param $model
     *
     * @return string|null
     */
    public function setTableRowId($model): ?string
    {
        return null;
    }

    /**
     * @param $model
     *
     * @return array
     */
    public function setTableRowAttributes($model): array
    {
        $attributes['id'] = $this->setTableRowId($model);
        $attributes['class'] = $this->setTableRowClass($model);
        return array_filter($attributes);
    }

    /**
     * @param $model
     *
     * @return string|null
     */
    public function getTableRowUrl($model): ?string
    {
        return null;
    }

    /**
     * @param $attribute
     * @param $value
     *
     * @return string|null
     */
    public function setTableDataClass($attribute, $value): ?string
    {
        return config(sprintf('laravel-livewire-tables.%s.classes.td', $this->theme),null);
    }

    /**
     * @param $attribute
     * @param $value
     *
     * @return string|null
     */
    public function setTableDataId($attribute, $value): ?string
    {
        return null;
    }

    /**
     * @param $attribute
     * @param $value
     *
     * @return array
     */
    public function setTableDataAttributes($attribute, $value): array
    {
        $attributes['id'] = $this->setTableDataId($attribute, $value);
        $attributes['class'] = $this->setTableDataClass($attribute, $value);
        return array_filter($attributes);
    }
     /**
     * Merge additional attributes / values into the attribute bag.
     *
     * @param  array  $attributeDefaults
     * @param  bool  $escape
     * @return static
     */
    public function merge(array $attributeDefaults = [], $escape = true)
    {
        $attributes = new Styles([]);

        return $attributes->merge($attributeDefaults,$escape);
    }
}
