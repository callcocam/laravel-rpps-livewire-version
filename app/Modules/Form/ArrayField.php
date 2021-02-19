<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */

namespace SIGA\Form;


class ArrayField extends BaseField
{

    protected $column_width;

    /**
     * ArrayField constructor.
     * @param $name
     */
    public function __construct($name)
    {
        $this->name = $name;
    }

    /**
     * @param $name
     * @return static
     */
    public static function make($name)
    {
        return new static($name);
    }

    /**
     * @param $width
     * @return $this
     */
    public function columnWidth($width)
    {
        $this->column_width = $width;
        return $this;
    }
}
