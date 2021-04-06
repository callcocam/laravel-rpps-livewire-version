<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */

namespace SIGA\Table\Traits;


trait Kill
{
    protected $confirming;

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
            flash("O registro foi excluido com sucesso!!", 'success')->dismissable()->livewire($this);
            return ;
        }catch (\PDOException $exception){
            flash(  $exception->getMessage(),'danger')->dismissable()->livewire($this);
            $this->confirming = null;
        }
    }

    public function getConfirmingProperty(){
        return $this->confirming;
    }
}
