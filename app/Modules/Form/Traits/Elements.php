<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */

namespace SIGA\Form\Traits;


trait Elements
{
    protected function elements(){
       $fields = [];
       if($this->fields()){
           foreach ($this->fields() as $field){
               $fields[$field->name] = $field;
           }
       }
       return $fields;
    }
}
