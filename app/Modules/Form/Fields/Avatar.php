<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */

namespace SIGA\Form\Fields;


use Callcocam\Livewire\Form\BaseField;

class Avatar extends BaseField
{
    protected $class = 'sr-only';

    protected $placeholder="Browser";
    /**
     * Field constructor.
     * @param $label
     * @param $name
     */
    public function __construct($label, $name)
    {
        parent::__construct($label, $name);
        $this->key = sprintf("form_data.%s", $this->name);
        $this->type( 'file');
        $this->attribute('id', $this->name);
        $this->view('avatar');
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
