@if ($tableHeaderEnabled)
    <thead class="{{ $this->getOption('tailwind.classes.thead') }}">
    @include(table_includes('columns'))
    </thead>
@endif
