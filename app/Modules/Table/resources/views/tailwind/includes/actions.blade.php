<div class="flex">
   @if($this->actionLink($model, 'show'))
        <a href="{{ $this->actionLink($model, 'show') }}" class="flex text-sm py-1 px-2 rounded-md text-gray-700 hover:text-opacity-70">{{ outline('eye') }} <span class="ml-2 hidden md:block">Show</span></a>
    @endif
    @if($this->actionLink($model, 'edit'))
        <a href="{{ $this->actionLink($model, 'edit') }}" class="flex text-sm py-1 px-2 rounded-md text-gray-700 hover:text-opacity-70">{{ outline('pencil-alt') }} <span class="ml-2 hidden md:block">Edit</span></a>
    @endif
    @if($this->actionLink($model, 'destroy'))
        @if($confirming)

        @else
            <a wire:click="confirmDelete({{$model->id}})" class="cursor-pointer flex text-sm py-1 px-2 rounded-md text-gray-700 hover:text-opacity-70"> {{ outline('trash') }} <span class="ml-2 hidden md:block">Delete</span></a>
        @endif
    @endif
</div>
