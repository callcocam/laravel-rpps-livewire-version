@if ($route)
    <a title="{{ _('Reload registers') }}" href="{{ route($route) }}"
       class="btn btn-warning">
        <x-c-icon class="mt-1 h-5 w-5 mr-2" icon="loop" stroke="currentColor"/>
        <span class="hidden md:block">{{ _('Reload') }}</span></a>
@endif
