<div class="flex-1 px-4 z-10">
    <div class="bg-white"
         @if (is_numeric($refresh)) wire:poll.{{ $refresh }}.ms
         @elseif(is_string($refresh)) wire:poll="{{ $refresh }}" @endif >
        <div class="my-2 overflow-x-hidden">
            <div class="py-2 align-middle inline-block min-w-full">,
                <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg p-5 relative">
                    @include(table_includes('offline'))
                    @include(table_includes('options'))
                    @if ($this->getOption('bootstrap.responsive'))
                        <div class="table-responsive">
                            @endif
                            <table class="{{ $this->getOption('bootstrap.classes.table') }}">
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
                            @if ($this->getOption('bootstrap.responsive'))
                        </div><!--table-responsive-->
                    @endif
                    @include(table_includes('pagination'))
                    @include(table_includes('loading'))
                </div>
            </div>
        </div>
    </div>
</div>
