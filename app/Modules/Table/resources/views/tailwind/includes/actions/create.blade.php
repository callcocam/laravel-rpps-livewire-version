@if ($route)
    @if (\Route::has($route))
        <a title="@lang('strings.create')" href="{{ route($route) }}"
           class="btn btn-defaul">
            <x-c-icon class="h-5 w-5" icon="plus" stroke="currentColor"/>
            <span class="hidden md:block">@lang('strings.create')</span> </a>
    @endif
@endif
