<div class="card">
    <div class="card-header">
       {{ $title }}
    </div>
    <div class="card-body">
        <form class="form-horizontal" wire:submit.prevent="save">
         {{ $slot }}
        </form>
    </div>
    <div class="card-footer">
       {{ $actions }}
    </div>
</div>
