<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */

namespace SIGA\Console\Commands;


use App\Models\User;
use App\Modules\Admin\App\Models\Menu;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UpdateMenusCommand extends Command
{

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:update-menus';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Altera os menus add dropdown lin ou title a coluna assets';


    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {


        $menus = Menu::query()->where([
            'name' => 'menusAdmin',
            'status' => '1',
        ])->get();
         $i=0;
        foreach ($menus as $menu){

           if ($menu->sub_menus->count()){

               foreach ($menu->sub_menus as $sub_menu) {
                   if($sub_menu->sub_menus->count()){
                       $sub_menu->assets = 'dropdown';
                       $sub_menu->name = Str::upper($sub_menu->name);
                       $sub_menu->slug = null;
                       $sub_menu->link = null;
                       $sub_menu->save();
                   }
                   else{
                       $sub_menu->assets = 'link';
                       $sub_menu->name = Str::ucfirst(Str::lower($sub_menu->name));
                       $sub_menu->save();
                   }
                   $i++;
               }
           }
        }

        $this->info(sprintf('%s menus alterado(s)', $i));
    }

}
