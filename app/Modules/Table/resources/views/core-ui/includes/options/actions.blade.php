<div class="col-md-3 col-sm-12">
    @include(table_includes('export'))
    @if($this->createLink())
        <a title="{{ _('Create new register') }}" href="{{ $this->createLink() }}"
           class="btn btn-primary">
            <x-c-icon icon="plus"/><span class="hidden">{{ _('Create') }}</span>
        </a>
    @endif
    @if($this->reloadLink())
        <a title="{{ _('Reload page') }}" href="{{ $this->reloadLink() }}"
           class="btn btn-warning">
            <x-c-icon icon="reload"/><span class="hidden">{{ _('Reload') }}</span></a>
    @endif
</div>
