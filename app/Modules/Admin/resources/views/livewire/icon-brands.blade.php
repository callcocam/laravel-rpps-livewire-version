<div class="container-fluid">
    <div class="fade-in">
        <div class="card card-default">
            <div class="card-header">
                <h1 class="card-title">CoreUI Icons</h1>
                <input wire:model="search" type="text" list="browsers"
                       class="rounded-lg form-control"
                       placeholder="@lang('landlord.search-icon')">
                <datalist id="browsers">
                    @if($this->datalist)
                        @foreach($this->datalist as $list)
                            <option value="{{ $list }}">
                        @endforeach
                    @endif
                </datalist>
            </div>
            <div class="card-body">
                <div class="row text-center">
                    @foreach($this->icons as $icon)
                    <div class="col-6 col-sm-4 col-md-2"><i class="c-icon c-icon-2xl mt-5 mb-2 {{$icon}}"></i>
                        <div>{{$icon}}</div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
