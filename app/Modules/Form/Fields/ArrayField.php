<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */

namespace SIGA\Form\Fields;


use SIGA\Form\BaseField;

class ArrayField extends BaseField
{

    protected $array_fields = [];
    protected $arry_sortable = false;
    protected $class = 'mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md';

    /**
     * Field constructor.
     * @param $label
     * @param $name
     */
    public function __construct($label, $name)
    {
        parent::__construct($label, $name);
        $this->attribute('name', $this->name);
        $this->view('array');
        $this->type( 'array');

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
     * @param array $fields
     * @return $this
     */
    public function array($fields = [])
    {
        $this->array_fields = $fields;

        return $this;
    }

}
