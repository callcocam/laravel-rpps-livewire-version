<div class="form-group row">
    <label class="col-md-3 col-form-label"> {{ $field->label }}</label>
    <div class="col-md-9 col-form-label">
        @foreach($field->options as $value => $label)
            <div class="form-check form-check-inline mr-1">
                <input wire:model.lazy="{{ $field->key }}" {{ $field->merge([
                                    'value'=>$value,
                                    'class'=>$field->class,
                                    'id'=> $field->name . '.' . $loop->index
                    ]) }}>
                <label class="form-check-label" for="{{$field->name . '.' . $loop->index}}">{{ $label }}</label>
            </div>
        @endforeach
        @include('laravel-livewire-forms::fields.error-help')
    </div>
</div>
