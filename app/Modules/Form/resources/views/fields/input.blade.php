<div class="form-group row">
    @include('laravel-livewire-forms::fields.label')
    <div class="col-md-9">
        <input wire:model.lazy="{{ $field->key }}" {{ $field->merge(['class'=>$field->class]) }}>
        @include('laravel-livewire-forms::fields.error-help')
    </div>
</div>
