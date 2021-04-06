@if ($route)
<a title="{{ _('Create new register') }}" href="{{ route($route) }}"
   class="btn btn-primary">
    <x-c-icon class="h-5 w-5" icon="plus" stroke="currentColor"/>
    <span class="hidden md:block">{{ _('Create') }}</span> </a>
@endif
