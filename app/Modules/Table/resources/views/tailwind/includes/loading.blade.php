@if ($loadingIndicator)
    <div wire:loading.class.remove="hidden" class="flex h-full w-full overflow-hidden items-center justify-center hidden text-white absolute top-0 left-0 right-0 button-0 bg-primary-600 bg-opacity-25 z-40">
        <div class="loader-3 z-50"></div>
    </div>
@endif
