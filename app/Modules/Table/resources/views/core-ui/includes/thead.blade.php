@if ($tableHeaderEnabled)
    <thead class="{{ $this->getOption('core-ui.classes.thead') }}">
    @include(table_includes('columns'))
    </thead>
@endif
