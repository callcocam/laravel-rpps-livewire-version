@if ($paginationEnabled || $searchEnabled)
    <div class="flex w-full p-5 items-center justify-between bg-white shadow-lg px-4">
        @if ($paginationEnabled && count($perPageOptions))
            <div class="flex w-64">
                <label for="perPage" class="flex mt-2"> @lang('strings.per_page'):&nbsp;</label>
                <select wire:model="perPage" id="perPage" class="flex rounded-md ml-2">
                    @foreach ($perPageOptions as $option)
                        <option>{{ $option }}</option>
                    @endforeach
                </select>
            </div><!--col-->
        @endif
        @if ($searchEnabled)
            <div class="flex w-full">
                @if ($clearSearchButton)
                    <div class="flex ">
                        @endif
                        <input
                            @if (is_numeric($searchDebounce) && $searchUpdateMethod === 'debounce') wire:model.debounce.{{ $searchDebounce }}ms="search"
                            @endif
                            @if ($searchUpdateMethod === 'lazy') wire:model.lazy="search" @endif
                            @if ($disableSearchOnLoading) wire:loading.attr="disabled" @endif
                            class="rounded-md py-2 flex-1"
                            type="text"
                            placeholder="{{ __('strings.search') }}"
                        />
                        @if ($clearSearchButton)
                           <button class="bg-gray-200 px-4 py-2 border border-b" type="button"
                                        wire:click="clearSearch">@lang('strings.clear')</button>
                    </div>
                @endif
            </div>
        @endif
         @include(table_includes('export'))
        <div class="flex  w-80 justify-between">
           {!! $this->createLink() !!}
           {!! $this->reloadLink() !!}
        </div>
    </div><!--row-->
@endif
