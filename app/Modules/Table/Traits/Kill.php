<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */

namespace SIGA\Table\Traits;


trait Kill
{
    public $confirming;

    public function confirmDelete($id)
    {
        $this->confirming = $id;
    }
    public function close()
    {

        $this->confirming = null;
    }

    public function kill($id)
    {
        try {
            $this->query()->find($id)->delete();
            $this->confirming = null;
            flash()->overlay("O registro foi excluido com sucesso!!", 'Ação de excluir')->livewire($this);
            return ;
        }catch (\PDOException $exception){
            flash()->overlay( $exception->getMessage(),'Ação de excluir')->livewire($this);
            $this->confirming = null;
        }
    }
}
