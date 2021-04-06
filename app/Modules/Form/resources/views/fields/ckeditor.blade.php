<div class="form-group row">
    @include('laravel-livewire-forms::fields.label')
    <div class="col-md-9" wire:ignore>
        <div {{ $field->merge(['class'=>$field->class]) }}
             x-data
             x-init="initCK($refs['{{ $field->name }}'],'{{ $field->name }}')"
             wire:key="{{ $field->name }}"
             x-ref="{{ $field->name }}"
        >{!! $form_data[$field->name] !!}</div>
        @include('laravel-livewire-forms::fields.error-help')
        @isset($field->help)
            <p class="mt-2 text-sm text-gray-500">
                {{$field->help}}
            </p>
        @endisset
    </div>
    @push('jsLivewire')
        <script>
           var routeCkeditorUpoload = '{{ route('laravel-livewire-forms.upload') }}'
        </script>
        <script src="{{ asset('js/ck-editor/init.js') }}"></script>
    @endpush
</div>
