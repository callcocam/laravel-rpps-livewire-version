<div class="container-fluid">
    <div class="fade-in">
        <div class="card card-default">
            <div class="card-header">
                <h1 class="card-title">CoreUI Icons</h1>
                <input wire:model="search" type="text" class="rounded-lg form-control"
                       placeholder="@lang('admin.search-icon')">
            </div>
            <div class="card-body">
                <div class="row text-center">
                    @foreach($this->icons as $icon)
                        <div class="col-6 col-sm-4 col-md-2">
                            <i class="c-icon c-icon-2xl mt-5 mb-2 cil-{{$icon}}"></i>
                            <div>{{$icon}}</div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
