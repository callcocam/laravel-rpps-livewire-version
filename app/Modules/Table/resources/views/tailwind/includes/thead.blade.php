@if ($tableHeaderEnabled)
    <thead class="{{ $this->getOption('bootstrap.classes.thead') }}">
    @include(table_includes('columns'))
    </thead>
@endif
