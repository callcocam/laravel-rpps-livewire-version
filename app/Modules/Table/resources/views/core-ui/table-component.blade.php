<div class="container-fluid">
    <div class="animated fadeIn"
         @if (is_numeric($refresh)) wire:poll.{{ $refresh }}.ms
         @elseif(is_string($refresh)) wire:poll="{{ $refresh }}" @endif >
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">,
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
        </div>
    </div>
</div>
