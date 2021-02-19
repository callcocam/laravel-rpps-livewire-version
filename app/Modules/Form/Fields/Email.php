<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */

namespace SIGA\Form\Fields;


use SIGA\Form\BaseField;

class Email extends BaseField
{

    protected $class = 'mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md';

    /**
     * Field constructor.
     * @param $label
     * @param $name
     */
    public function __construct($label, $name)
    {
        parent::__construct($label, $name);
        $this->key = sprintf("form_data.%s", $this->name);
        $this->type( 'email');
        $this->view('input');
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
     * @param $placeholder
     * @return $this
     */
    public function placeholder($placeholder)
    {
        $this->attribute('placeholder', $placeholder);
        return $this;
    }

    /**
     * @param $autocomplete
     * @return $this
     */
    public function autocomplete($autocomplete)
    {
        $this->attribute('autocomplete', $autocomplete);
        return $this;
    }
}
