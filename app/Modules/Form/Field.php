<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */

namespace SIGA\Form;


use Illuminate\Support\Str;
use Illuminate\View\AppendableAttributeValue;

class Field extends BaseField
{

    protected $class = 'mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md';


    /**
     * Field constructor.
     * @param $label
     * @param $name
     */
    public function __construct($label, $name)
    {
        $this->label = $label;
        $this->name = $name ?? Str::snake(Str::lower($label));
        $this->attribute('name', $this->name);
        $this->key = sprintf("form_data.%s", $this->name);
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
    public function cover()
    {
        $this->type = 'cover';
        return $this;
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
     * @param array $fields
     * @return $this
     */
    public function array($fields = [])
    {
        $this->type = 'array';
        $this->array_fields = $fields;
        return $this;
    }

    /**
     * @return $this
     */
    public function sortable()
    {
        $this->arry_sortable = true;
        return $this;
    }

    /**
     * @param $class
     * @return $this
     */
    public function class($class)
    {

        $this->attribute('class',new AppendableAttributeValue($class));

        return $this;
    }
}
