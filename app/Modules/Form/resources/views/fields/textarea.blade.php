<div class="form-group row">
    @include('laravel-livewire-forms::fields.label')
    <div class="col-md-9">
        <textarea  wire:ignore wire:model.lazy="{{ $field->key }}"  {{ $field->merge(['class'=>$field->class]) }}></textarea>
        @include('laravel-livewire-forms::fields.error-help')
        @isset($field->help)
            <p class="mt-2 text-sm text-gray-500">
                {{$field->help}}
            </p>
        @endisset
    </div>
    @push('js')
        <script>
            window.addEventListener("load", function (event) {
                initEditor('{{$field->name}}');
            });
        </script>
    @endpush
</div>
