<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */

namespace SIGA\Form\Traits;


use Illuminate\Support\Facades\Schema;

trait FillsColumns
{

    public function getFillible(){

        return Schema::getColumnListing($this->getTable());
    }
}
