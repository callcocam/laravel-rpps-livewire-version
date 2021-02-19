<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */

namespace SIGA\Form\Fields;


use SIGA\Form\BaseField;
use Illuminate\Support\Str;

class Checkbox extends BaseField
{

    protected $label;
    protected $key;
    protected $class = 'mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md';

    /**
     * Field constructor.
     * @param $label
     * @param $name
     */
    public function __construct($label, $name)
    {
        parent::__construct($label, $name);
        $this->type( 'checkbox');
        $this->view('checkbox');

    }

    /**
     * @param array $options
     * @return $this
     */
    public function checkboxs($options = [])
    {
        $this->attribute('type', 'checkboxs');
        $this->view('checkboxs');
        $this->options($options);
        return $this;
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

}
