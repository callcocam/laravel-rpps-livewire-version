<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */

namespace App\Modules\Admin\App\Http\Livewire\Auth\Password;

use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;
use App\Modules\Admin\App\Http\Livewire\Auth\AbstractAuth;

class Reset extends AbstractAuth
{
    public $password_confirmation, $email, $password, $token;

    protected $rules = [
        'token' => 'required',
        'email' => 'required|string|email',
        'password' => 'required|string|confirmed|min:8'
    ];

    public function mount($token){
        $this->email = request()->query('email');
        $this->token = $token;
    }

    public function render()
    {
        return view('livewire.auth.password.reset')->layout('layouts.guest',$this->pageConfig());
    }


    /**
     * Handle an incoming new password request.
     *
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store()
    {
        $this->validate();
        $status = Password::reset(
            $this->only(['email', 'password', 'password_confirmation', 'token']),
            function ($user) {
                $user->forceFill([
                    'password' => Hash::make($this->password),
                    'remember_token' => Str::random(60),
                ])->save();
                event(new PasswordReset($user));
            }
        );


        if($status == Password::PASSWORD_RESET){
            session()->flash('status',  __($status));
            return redirect()->route('login');
        }
        else{
            $this->addError('email',  __($status));
        }
    }
}
