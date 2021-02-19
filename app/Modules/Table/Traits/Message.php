<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */

namespace SIGA\Table\Traits;


trait Message
{

    public function errorMessage($message=null){

        return "O registro foi excluido com sucesso!!";
    }

    public function successMessage($message=null){
      return $message;
    }
}
