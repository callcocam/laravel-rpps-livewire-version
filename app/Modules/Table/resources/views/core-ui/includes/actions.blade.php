<div class="d-flex">
   @if($this->actionLink($model, 'show'))
        <a href="{{ $this->actionLink($model, 'show') }}" class="btn btn-info btn-sm"> <x-c-icon icon="eye"/>  <span class="ml-1 hidden">Show</span></a>
    @endif
    @if($this->actionLink($model, 'edit'))
        <a href="{{ $this->actionLink($model, 'edit') }}" class="btn btn-success btn-sm"><x-c-icon icon="pencil"/><span class="ml-1 hidden">Edit</span></a>
    @endif
      @can($this->permission('destroy'))
        @if($confirming)

        @else
            <a wire:click="confirmDelete({{$model->id}})" class="btn btn-danger"> <x-c-icon icon="trash"/> <span class="ml-1 hidden">Delete</span></a>
        @endif
       @endcan
</div>
