@if($this->createLink())
    <a title="{{ _('Create new register') }}" href="{{ $this->createLink() }}"
       class="btn btn-defaul">
        <x-c-icon class="h-5 w-5" icon="plus" stroke="currentColor"/>
        <span class="hidden md:block">@lang('strings.create')</span> </a>
@endif
@if($this->reloadLink())
    <a title="{{ _('Reload page') }}" href="{{ $this->reloadLink() }}"
       class="btn btn-defaul">
        <x-c-icon class="mt-1 h-5 w-5 mr-2" icon="loop" stroke="currentColor"/>
        <span class="hidden md:block">@lang('strings.reload')</span></a>
@endif
