<div class="col-md-6 col-sm-12">
    @if ($clearSearchButton)
        <div class="form-group row">
            <div class="col-md-12">
                <div class="input-group">
                    @endif
                    <input
                        @if (is_numeric($searchDebounce) && $searchUpdateMethod === 'debounce') wire:model.debounce.{{ $searchDebounce }}ms="search"
                        @endif
                        @if ($searchUpdateMethod === 'lazy') wire:model.lazy="search" @endif
                        @if ($disableSearchOnLoading) wire:loading.attr="disabled" @endif
                        class="form-control"
                        type="text"
                        placeholder="{{ __('strings.search') }}"
                    />
                    @if ($clearSearchButton)
                        <span class="input-group-append">
                            <button
                                class="btn btn-outline-dark"
                                type="button"
                                wire:click="clearSearch">@lang('strings.clear')
                            </button>
                        </span>
                </div>
            </div>
        </div>
    @endif
</div>
