<div class="flex">
    @if($this->actionLink($model, 'show'))
        <a href="{{ $this->actionLink($model, 'show') }}" class="btn btn-primary btn-sm"><x-c-icon class="-ml-1 mr-1 h-5 w-5 text-gray-500" fill="currentColor" icon="external-link"/><span class="ml-2 hidden md:block">@lang('strings.show')</span></a>
    @endif
    @if($this->actionLink($model, 'edit'))
        <a href="{{ $this->actionLink($model, 'edit') }}" class="btn btn-success btn-sm"><x-c-icon class="-ml-1 mr-1 h-5 w-5 text-gray-500" fill="currentColor" icon="pencil"/> <span class="ml-2 hidden md:block">@lang('strings.edit')</span></a>
    @endif
    @if($this->permission('destroy'))
        @if($this->confirming && $this->confirming == $model->id)
            <a wire:click="kill('{{$model->id}}')" class="btn btn-warning btn-sm"><x-c-icon class="-ml-1 mr-1 h-5 w-5 text-danger-500" fill="currentColor" icon="trash"/> <span class="ml-2 hidden md:block">@lang('strings.confirm')</span></a>
        @else
            <a wire:click="confirmDelete('{{$model->id}}')" class="btn btn-danger btn-sm"><x-c-icon class="-ml-1 mr-1 h-5 w-5 text-danger-500" fill="currentColor" icon="trash"/> <span class="ml-2 hidden md:block">@lang('strings.delete')</span></a>
        @endif
    @endif
</div>
