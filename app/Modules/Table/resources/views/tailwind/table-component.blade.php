<div class="flex flex-col mt-8">
<div class="{{ $this->getOption('tailwind.classes.container') }}">
    <div class="{{ $this->getOption('tailwind.classes.sub-container') }}"
         @if (is_numeric($refresh)) wire:poll.{{ $refresh }}.ms
         @elseif(is_string($refresh)) wire:poll="{{ $refresh }}" @endif >
            @include(table_includes('offline'))
            @include(table_includes($this->ViewOption))
                @if ($this->getOption('tailwind.responsive'))
                    <div class="{{$this->getOption('tailwind.responsive')}}">
                        @endif
                        <table class="{{ $this->getOption('tailwind.classes.table') }}">
                            @include(table_includes('thead'))
                            <tbody class="bg-white">
                            @if(is_object($models))
                                @if($models->isEmpty())
                                    @include(table_includes('empty'))
                                @else
                                    @include(table_includes('data'))
                                @endif
                            @else
                                @if(!$models)
                                    @include(table_includes('empty'))
                                @else
                                    @include(table_includes('data'))
                                @endif
                            @endif
                            </tbody>
                            @include(table_includes('tfoot'))
                        </table>
                        @if ($this->getOption('tailwind.responsive'))
                    </div><!--table-responsive-->
                @endif
            @include(table_includes('pagination'))
            @include(table_includes('loading'))
    </div>
</div>
</div>
