<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */

namespace SIGA\Form\Fields;


use SIGA\Form\BaseField;
use Illuminate\Support\Str;

class CKEditor extends BaseField
{

    protected $class = 'form-control d-none';


    /**
     * Field constructor.
     * @param $label
     * @param $name
     */
    public function __construct($label, $name)
    {
        parent::__construct($label, $name);
        $this->attribute('name', $this->name);
        $this->attribute('id', $this->name);
        $this->view('ckeditor');

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

}
