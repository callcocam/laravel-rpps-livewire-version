<div class="position-relative">
    @if($shown)
        <div class="fixed-top alert alert-{{ $color }} alert-dismissible fade show" role="alert" style="z-index: 1500">
            <strong> {{ $title }} </strong>  {{$message}}
            @isset ($dismissable)
                @if ($dismissable)
                    <button  wire:click="dismiss()" type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                @endif
            @endisset
        </div>
    @endif
</div>
