<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */

namespace SIGA\Form\Fields;


use SIGA\Form\BaseField;

class Cover extends BaseField
{
    protected $class = 'd-none';

    protected $placeholder = "Select Image";

    /**
     * Field constructor.
     * @param $label
     * @param $name
     */
    public function __construct($label, $name)
    {
        parent::__construct($label, $name);
        $this->key = sprintf("form_data.%s", $this->name);
        $this->attribute('id', $this->name);
        $this->type('file');
        $this->view('cover');
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
        $this->placeholder = $placeholder;

        return $this;
    }

}
