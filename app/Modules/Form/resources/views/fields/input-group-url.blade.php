<div class="{{ $field->class_card }}">
    <div class="{{ $field->class_block }}">
        <label {!! $field->label() !!}>
            {{ $field->label }}
        </label>
        <div class="{{ $field->class_body }}">
                  <span  class="{{ $field->class_span }}"> {{ $field->append }} </span>
            <input  {{ $field->merge(['class'=>$field->class]) }} wire:model.lazy="{{ $field->key }}">
        </div>
        @include('laravel-livewire-forms::fields.error-help')
    </div>
</div>
