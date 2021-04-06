<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */

namespace App\Modules\Console\Commands;


use Illuminate\Console\Command;
use Illuminate\Support\Str;

class CrudCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'livewire:_crud {name} {module=default}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Gerar crud livewire para modules';


    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $name = Str::plural($this->argument('name'));


        $this->call('make:_model',[
            'name'=>$this->argument('name'),
            'module'=> $this->argument('module')
        ]);

        $this->call('livewire:_create',[
            'name'=>$name,
            'module'=> $this->argument('module')
        ]);
        $this->call('livewire:_edit',[
            'name'=>$name,
            'module'=> $this->argument('module')
        ]);
        $this->call('livewire:_table',[
            'name'=>$name,
            'module'=> $this->argument('module')
        ]);
    }
}
