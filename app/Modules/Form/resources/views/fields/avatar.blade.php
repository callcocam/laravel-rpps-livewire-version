<div>
    <label class="block text-sm font-medium text-gray-700">
        {{ $field->label }}
    </label>
    <div class="mt-2 flex items-center">
                <span class="inline-block h-12 w-12 rounded-full overflow-hidden bg-gray-100">
                   @if($form_data[$field->name])
                        <img src="{{ Storage::url(str_replace('storage','', $form_data[$field->name])) }}" alt="{{ $field->label }}">
                    @else
                        <svg class="h-full w-full text-gray-300" fill="currentColor" viewBox="0 0 24 24">
                    <path
                        d="M24 20.993V24H0v-2.996A14.977 14.977 0 0112.004 15c4.904 0 9.26 2.354 11.996 5.993zM16.002 8.999a4 4 0 11-8 0 4 4 0 018 0z"/>
                  </svg>
                    @endif
                </span>
        <label for="{{ $field->name }}"
               class="ml-5 bg-white py-2 px-3 border border-gray-300 rounded-md shadow-sm text-sm leading-4 font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
            {{ $field->placeholder }}
            <input {{ $field->merge(['class'=>$field->class]) }} multiple>
        </label>
    </div>
</div>
