@if ($paginationEnabled || $searchEnabled)
    <div class="card-header">
        <div class="row mt-4">
            @if ($paginationEnabled && count($perPageOptions))
                @include(table_includes('options.per-page'))
            @endif
            @if ($searchEnabled)
                @include(table_includes('options.search'))
            @endif
            <div class="col-md-3 col-sm-12">
                {!! $this->createLink() !!}
                {!! $this->reloadLink() !!}
            </div>
        </div>
    </div><!--row-->
@endif
