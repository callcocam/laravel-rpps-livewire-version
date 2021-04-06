@if ($offlineIndicator)
    <div wire:offline.class="block" wire:offline.class.remove="none" class="alert alert-danger d-none">
        @lang('strings.offline')
    </div>
@endif
