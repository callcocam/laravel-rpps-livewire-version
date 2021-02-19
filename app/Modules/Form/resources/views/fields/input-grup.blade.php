<div class="grid grid-cols-3 gap-6">
    <div class="col-span-3 sm:col-span-2">
        <label for="{{ $field->name }}" class="block text-sm font-medium text-gray-700">
            {{ $field->label }}
        </label>
        <div class="mt-1 flex rounded-md shadow-sm">
                  <span class="inline-flex items-center px-3 rounded-l-md border border-r-0 border-gray-300 bg-gray-50 text-gray-500 text-sm">
                    http://
                  </span>
            <input
                type="text"
                name="{{ $field->name }}"
                id="{{ $field->name }}"
                class="focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-full rounded-none rounded-r-md sm:text-sm border-gray-300"
                autocomplete="{{ $field->autocomplete }}"
                placeholder="{{ $field->placeholder }}"
                wire:model.lazy="{{ $field->key }}">
            @include('laravel-livewire-forms::fields.error-help')
        </div>
    </div>
</div>
