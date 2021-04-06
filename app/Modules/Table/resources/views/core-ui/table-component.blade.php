<div class="container-fluid">
    <div class="animated fadeIn"
         @if (is_numeric($refresh)) wire:poll.{{ $refresh }}.ms
         @elseif(is_string($refresh)) wire:poll="{{ $refresh }}" @endif >
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                <div class="nav-tabs-boxed">
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#home" role="tab" aria-controls="home">@lang('strings.data')</a></li>
                        <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#config" role="tab" aria-controls="profile">@lang('strings.translations')</a></li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active" id="home" role="tabpanel">
                            <div class="card">
                                @include(table_includes('offline'))
                                @include(table_includes('options'))
                                <div class="card-body">
                                    @if ($this->getOption('core-ui.responsive'))
                                        <div class="table-responsive">
                                            @endif
                                            <table class="{{ $this->getOption('core-ui.classes.table') }}">
                                                @include(table_includes('thead'))
                                                <tbody>
                                                @if($models->isEmpty())
                                                    @include(table_includes('empty'))
                                                @else
                                                    @include(table_includes('data'))
                                                @endif
                                                </tbody>
                                                @include(table_includes('tfoot'))
                                            </table>
                                            @if ($this->getOption('core-ui.responsive'))
                                        </div><!--table-responsive-->
                                    @endif
                                    @include(table_includes('pagination'))
                                    @include(table_includes('loading'))
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane" id="config" role="tabpanel">
                           @livewire('translations' , [
                            'group'=>$this->route()
                            ])
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
