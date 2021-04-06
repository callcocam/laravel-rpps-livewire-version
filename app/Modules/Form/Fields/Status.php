<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */

namespace SIGA\Form\Fields;


use SIGA\Form\BaseField;
use Illuminate\Support\Str;

class Status extends BaseField
{

    protected $class = 'form-check-input';

    /**
     * Field constructor.
     * @param $label
     * @param $name
     */
    public function __construct($label, $name)
    {
        parent::__construct($label, $name);
        $this->attribute('name', $this->name);
        $this->type( 'radio');
        $this->view('radio');
        $this->options([
            '0'=>'Draft',
            '1'=>'Published',
        ]);
        $this->inline();

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

    public function inline(){

        $this->view('radio-inline');

        return $this;
    }
}
