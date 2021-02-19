@if ($paginationEnabled || $searchEnabled)
    <div class="flex w-full mb-4 mt-5 items-center justify-between">
        @if ($paginationEnabled && count($perPageOptions))
            <div class="flex w-64">
                <label for="perPage" class="flex mt-2"> @lang('strings.per_page'):&nbsp;</label>
                <select wire:model="perPage" id="perPage" class="flex rounded-md border-none ml-2">
                    @foreach ($perPageOptions as $option)
                        <option>{{ $option }}</option>
                    @endforeach
                </select>
            </div><!--col-->
        @endif
        @if ($searchEnabled)
            <div class="flex w-full">
                @if ($clearSearchButton)
                    <div class="flex-1">
                        @endif
                        <input
                            @if (is_numeric($searchDebounce) && $searchUpdateMethod === 'debounce') wire:model.debounce.{{ $searchDebounce }}ms="search"
                            @endif
                            @if ($searchUpdateMethod === 'lazy') wire:model.lazy="search" @endif
                            @if ($disableSearchOnLoading) wire:loading.attr="disabled" @endif
                            class="flex-1  rounded-md border-none mx-5"
                            type="text"
                            placeholder="{{ __('strings.search') }}"
                        />
                        @if ($clearSearchButton)
                            <div class="input-group-append">
                                <button class="btn btn-outline-dark" type="button"
                                        wire:click="clearSearch">@lang('strings.clear')</button>
                            </div>
                    </div>
                @endif
            </div>
        @endif
         @include(table_includes('export'))
        <div class="flex  w-80 justify-between">
            @if($this->createLink())
                <a title="{{ _('Create new register') }}" href="{{ $this->createLink() }}"
                   class="flex py-2 px-4 shadow rounded-md bg-vuexy-700 text-white font-bold ml-2">
                   {{ outline('plus','text-white') }}
                    <span class="hidden md:block">{{ _('Create') }}</span> </a>
            @endif
            @if($this->reloadLink())
                <a title="{{ _('Reload page') }}" href="{{ $this->reloadLink() }}"
                   class="flex py-2 px-4 shadow rounded-md bg-yellow-700 text-white font-bold">
                    {{ outline('refresh') }}
                    <span class="hidden md:block">{{ _('Reload') }}</span></a>
            @endif
        </div>
    </div><!--row-->
@endif
