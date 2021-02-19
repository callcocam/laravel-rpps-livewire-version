<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */

namespace SIGA\Form;


use Illuminate\Database\Eloquent\Model;
use SIGA\Form\Traits\StylesColumn;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;

class BaseField
{

    use StylesColumn;

    protected $type;
    protected $class;
    protected $key;
    protected $label;
    protected $label_attributes;
    protected $name;
    protected $options=[];
    protected $default;
    protected $help;
    protected $rules;
    protected $view;

    /**
     * Field constructor.
     * @param $label
     * @param $name
     */
    public function __construct($label, $name)
    {
        $this->label = $label;
        $this->name = $name ?? Str::snake(Str::lower($label));
        $this->key = sprintf("form_data.%s", $this->name);
        $this->attribute('name', $this->name);
    }

    /**
     * @param $property
     * @return mixed
     */
    public function __get($property)
    {
        return $this->$property;
    }

    /**
     * @param $default
     * @return $this
     */
    public function default($default)
    {
        $this->default = $default;
        return $this;
    }

    /**
     * @param $type
     * @return $this
     */
    public function type($type)
    {
        $this->type = $type;
        $this->attribute('type', $type);
        return $this;
    }

    /**
     * @param $help
     * @return $this
     */
    public function help($help)
    {
        $this->help = $help;
        return $this;
    }

    /**
     * @param $rules
     * @return $this
     */
    public function rules($rules)
    {
        $this->rules = $rules;
        return $this;
    }

    /**
     * @param $view
     * @return $this
     */
    public function view($view)
    {
        $this->view = $view;
        return $this;
    }

    public function label_attributes($attributes =[]){
        $this->label_attributes = new Label($attributes);
        return $this;
    }

    public function label(){
        return $this->label_attributes;
    }

    /**
     * @param $options
     */
    public function options($options)
    {
        $this->options = Arr::isAssoc($options) ? array_flip($options) : array_combine($options, $options);
        return $this;
    }
    /**
     * @param $options
     */
    public function has($key)
    {
        return isset($this->attributes[$key]);
    }


}
