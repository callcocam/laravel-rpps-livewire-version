<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card-group">
                <div class="card p-4">
                    <div class="card-body">
                        <h1>Login</h1>
                        <p class="text-muted">Sign In to your account</p>
                        <!-- Validation Errors -->
                        <!-- Session Status -->
                        <x-auth-session-status class="mb-4" :status="session('status')" />
                        <!-- Validation Errors -->
                        <x-auth-validation-errors class="mb-4" :errors="$errors" />
                        <div class="text-green-500 w-full my-5 mx-auto" wire:loading wire:target="authenticate">
                            {{ __('Processing request') }}...
                        </div>
                        <form wire:submit.prevent="authenticate">
                            @csrf
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                  <span class="input-group-text">
                                    <svg class="c-icon">
                                      <use xlink:href="{{ asset('assets/icons/coreui/free-symbol-defs.svg#cui-user') }}"></use>
                                    </svg>
                                  </span>
                                </div>
                                <input wire:model="email" class="form-control" type="text" placeholder="{{ __('E-Mail Address') }}">
                            </div>
                            <div class="input-group mb-4">
                                <div class="input-group-prepend">
                                  <span class="input-group-text">
                                    <svg class="c-icon">
                                      <use xlink:href="{{ asset('assets/icons/coreui/free-symbol-defs.svg#cui-lock-locked') }}"></use>
                                    </svg>
                                  </span>
                                </div>
                                <input wire:model="password" class="form-control" type="password" placeholder="{{ __('Password') }}">
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <button class="btn btn-primary px-4" type="submit">{{ __('Login') }}</button>
                                </div>
                                <div class="col-6 text-right">
                                    <a href="{{ route('password.forgot') }}"
                                       class="btn btn-link px-0">{{ __('Forgot Your Password?') }}</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="card text-white bg-primary py-5 d-md-down-none" style="width:44%">
                    <div class="card-body text-center">
                        <div>
                            <h2>{{ $this->tenant->name }}</h2>
                            <p>{{ $this->tenant->preview }}</p>
                            @if (Route::has('register'))
                                <a href="{{ route('register') }}"
                                   class="btn btn-primary active mt-3">{{ __('Register') }}</a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
