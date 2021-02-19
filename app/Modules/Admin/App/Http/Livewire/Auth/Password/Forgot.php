<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */

namespace App\Modules\Admin\App\Http\Livewire\Auth\Password;


use Illuminate\Support\Facades\Password;
use App\Modules\Admin\App\Http\Livewire\Auth\AbstractAuth;

class Forgot extends AbstractAuth
{
    public $email;

    protected $rules = [
        'email' => 'required|string|email'
    ];

    public function render()
    {
        return view('livewire.auth.password.forgot')->layout('layouts.guest',$this->pageConfig());
    }
/**
     * Handle an incoming password reset link request.
     *
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store()
    {
        $this->validate();

        // We will send the password reset link to this user. Once we have attempted
        // to send the link, we will examine the response then see the message we
        // need to show to the user. Finally, we'll send out a proper response.
        $status = Password::sendResetLink(
            $this->only(['email'])
        );

        if($status == Password::RESET_LINK_SENT){
            session()->flash('status',  __($status));
        }
        else{
            $this->addError('email',  __($status));
        }
    }
}
