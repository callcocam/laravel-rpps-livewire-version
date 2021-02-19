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
    protected $optionDefaults = [
        'bootstrap' => [
            'classes' => [
                'buttons' => [
                    'export' => 'btn',
                ],
                'table' => 'min-w-full divide-y divide-gray-200',
                'thead' => 'bg-gray-50',
                'th'=>[
                    'actions' => 'w-44 flex',
                ],
                'td'=>[]
            ],
            'container' => true,
            'responsive' => true,
        ],
    ];

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
     * @param  array  $overrides
     */
    protected function setOptions(array $overrides = []): void
    {
        foreach ($overrides as $key => $value) {
            data_set($this->optionDefaults, $key, $value);
        }
    }
}
