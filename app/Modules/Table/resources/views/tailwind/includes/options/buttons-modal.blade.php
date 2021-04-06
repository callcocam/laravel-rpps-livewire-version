<div x-data="{open:false}">
    <button @click="open=true" title="{{ _('Create new register') }}"
            class="btn btn-defaul">
        <x-c-icon class="h-5 w-5" icon="plus" stroke="currentColor"/>
        <span class="hidden md:block">{{ _('Create') }}</span>
    </button>
    @include(table_includes('options.modal'))
</div>
@if($this->reloadLink())
    <a title="{{ _('Reload page') }}" href="{{ $this->reloadLink() }}"
       class="btn btn-defaul">
        <x-c-icon class="mt-1 h-5 w-5 mr-2" icon="loop" stroke="currentColor"/>
        <span class="hidden md:block">{{ _('Reload') }}</span></a>
@endif

