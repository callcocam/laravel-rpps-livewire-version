<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */
if (! function_exists('table_includes')) {

    /**
     * Arrange for a normal, session-based flash message.
     *
     * @param $include
     */
    function table_includes($include)
    {

        return sprintf('laravel-livewire-tables::%s.includes.%s', config('laravel-livewire-tables.theme','tailwind'), $include);
    }
}
