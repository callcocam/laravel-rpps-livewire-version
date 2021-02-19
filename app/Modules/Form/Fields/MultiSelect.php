<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */

namespace SIGA\Form\Fields;

use SIGA\Form\BaseField;

class MultiSelect extends BaseField
{

    protected $class = 'c-multi-select';

    /**
     * Field constructor.
     * @param $label
     * @param $name
     */
    public function __construct($label, $name)
    {
        parent::__construct($label, $name);
        $this->attribute('name', $this->name);
        $this->view('mult-select-dropdown');
        $this->multiple();
        $this->styles = [
            'display' => 'none'
        ];
    }

    /**
     * @param $label
     * @param null $name
     * @return static
     */
    public static function make($label, $name = null)
    {
        return new static($label, $name);
    }

    /**
     * @return $this
     */
    public function multiple()
    {
        $this->attribute('multiple', true);
        return $this;
    }

    /**
     * @return $this
     */
    public function dropdown()
    {
        $this->view('mult-select-dropdown');
        return $this;
    }

    /**
     * @return $this
     */
    public function inline()
    {
        $this->view('mult-select-inline');
        return $this;
    }

    public function target($query, $where = null, $label = "name", $key = "id")
    {

        if (is_string($query)) {
            $query = app($query);
        }
        if ($where) {
            $query->where($label, 'like', '%' . $where . '%');
        }
        $this->options($query->pluck($key, $label)->toArray());

        return $this;
    }
}
