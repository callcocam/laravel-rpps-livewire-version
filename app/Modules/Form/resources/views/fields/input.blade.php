<div class="form-group row">
    <label class="col-md-3 col-form-label" for="text-input">{{ $field->label }}</label>
    <div class="col-md-9">
        <input wire:model.lazy="{{ $field->key }}" {{ $field->merge(['class'=>$field->class]) }}>
        @include('laravel-livewire-forms::fields.error-help')
    </div>
</div>
