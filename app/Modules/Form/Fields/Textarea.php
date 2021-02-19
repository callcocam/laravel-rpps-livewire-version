<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */

namespace SIGA\Form\Fields;


use SIGA\Form\BaseField;
use Illuminate\Support\Str;

class Textarea extends BaseField
{

    protected $class = 'form-control';


    /**
     * Field constructor.
     * @param $label
     * @param $name
     */
    public function __construct($label, $name)
    {
        parent::__construct($label, $name);
        $this->attribute('name', $this->name);
        $this->attribute('rows', 10);
        $this->view('textarea');

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
     * @param int $rows
     * @return $this
     */
    public function rows($rows = 2)
    {
        $this->attribute('rows', $rows);

        return $this;
    }

    /**
     * @param $col
     * @return $this
     */
    public function col($col)
    {
        $this->attribute('col', $col);

        return $this;
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
