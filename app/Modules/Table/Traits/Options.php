<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */

namespace SIGA\Table\Traits;

use Illuminate\Support\Arr;

/**
 * Trait Options.
 */
trait Options
{

    /**
     * @var array
     */
    protected $options = [];

    /**
     * @var array
     */
    protected $optionDefaults = [];

    /**
     * @param $option
     *
     * @return mixed
     */
    public function getOption($option)
    {
        return Arr::dot($this->optionDefaults)[$option] ?? null;
    }

    /**
     * @param array $overrides
     */
    protected function setOptions(array $overrides = []): void
    {
        foreach ($overrides as $key => $value) {
            data_set($this->optionDefaults, $key, $value);
        }
    }

    public function getViewOptionProperty()
    {
        return 'options';
    }

    public function getViewOptionButtonsProperty()
    {
        return 'options.buttons';
    }
}
