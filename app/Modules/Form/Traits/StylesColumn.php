<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */

namespace SIGA\Form\Traits;

use SIGA\Form\Styles;
use Illuminate\View\AppendableAttributeValue;

trait StylesColumn
{
    protected $styles = [];
    protected $attributes = [];


    /**
     * @param $class
     * @return $this
     */
    public function class($class)
    {
        $this->class = $class;

        return $this;
    }

    public function span($span)
    {

        $this->styles[] = "col-span-{$span}";

        return $this;
    }

    public function attribute($name, $attribute)
    {
        $this->attributes[$name] = $attribute;

        return $this;
    }

    /**
     * Merge additional attributes / values into the attribute bag.
     *
     * @param  array  $attributeDefaults
     * @param  bool  $escape
     * @return static
     */
    public function merge(array $attributeDefaults = [], $escape = true)
    {
        $attributes = new Styles($this->attributes);

        return $attributes->merge($attributeDefaults,$escape);
    }
}
