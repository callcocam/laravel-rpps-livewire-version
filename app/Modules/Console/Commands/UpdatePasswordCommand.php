<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */

namespace SIGA\Console\Commands;


use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;

class UpdatePasswordCommand extends Command
{

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:update-password';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Altera as senha Security para onew pass';


    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {


        $users = User::query()->orderByDesc('id')->get();
         $i=0;
        foreach ($users as $user){

            if (Hash::check(sprintf("Security-%s", $user->email),$user->password)){
                $user->password = Hash::make('Security');
                $user->save();
                $i++;
            }
        }

        $this->info(sprintf('%s senhas alteradas', $i));
    }

}
