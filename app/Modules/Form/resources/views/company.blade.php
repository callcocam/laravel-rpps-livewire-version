<div class="mr-4 ml-4">

    <div class="nav-tabs-boxed">
        <ul class="nav nav-tabs" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" data-toggle="tab" href="#home" role="tab"
                                    aria-controls="home">Empresa</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#users" role="tab"
                                    aria-controls="profile">Usuários</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#roles" role="tab"
                   aria-controls="profile">Roles</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#permiisios" role="tab"
                                    aria-controls="messages">Permissões</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#menus" role="tab"
                   aria-controls="messages">Menus</a>
            </li>
        </ul>
        <div class="tab-content">
            <div class="tab-pane active" id="home" role="tabpanel">
                <div class="card">
                    <div class="card-body">
                        <form class="form-horizontal" wire:submit.prevent="save">
                            @foreach($fields as $field)
                                @include('laravel-livewire-forms::fields.' . $field->view)
                            @endforeach
                        </form>
                    </div>
                    <div class="card-footer">
                        <button class="btn btn-dark" wire:click="saveAndGoBackResponse" type="button">
                            <x-c-icon icon="arrow-thick-to-left"/> @lang('form.back-to-list')</button>
                        @if($model->exists)
                            <button class="btn btn-primary" wire:click="saveAndStay" type="button">
                                <x-c-icon icon="save"/> @lang('form.save')</button>
                        @else
                            <button class="btn btn-primary" wire:click="saveAndEditStay" type="button">
                                <x-c-icon icon="save"/> @lang('form.save')</button>
                        @endif
                        <button class="btn btn-success" wire:click="saveAndGoBack" type="button">
                            <x-c-icon icon="save"/> @lang('form.save-go-back')</button>
                    </div>
                </div>
            </div>
            <div class="tab-pane" id="users" role="tabpanel">
                @livewire('lv-admin::companies.users',['company'=>$model])
            </div>
            <div class="tab-pane" id="roles" role="tabpanel">
                @livewire('lv-admin::companies.roles',['company'=>$model])
            </div>
            <div class="tab-pane" id="permissions" role="tabpanel">3. Lorem ipsum dolor sit amet, consectetur adipisicing
                elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis
                nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in
                reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat
                cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
            </div>
            <div class="tab-pane" id="menus" role="tabpanel">3. Lorem ipsum dolor sit amet, consectetur adipisicing
                elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis
                nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in
                reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat
                cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
            </div>
        </div>
    </div>
    @include("laravel-livewire-forms::scripts",['class'=>get_class($this)])
</div>
