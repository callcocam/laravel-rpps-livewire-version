<div class="form-group row">
    @include('laravel-livewire-forms::fields.label')
    <div class="col-md-9">
        <select wire:model.lazy="{{ $field->key }}"  {{ $field->merge(['class'=>$field->class]) }}>
            <option value="0">Please select</option>
            @foreach($field->options as $value => $label)
                <option value="{{ $value }}">{{ $label }}</option>
            @endforeach
        </select>
        @include('laravel-livewire-forms::fields.error-help')
    </div>
</div>
