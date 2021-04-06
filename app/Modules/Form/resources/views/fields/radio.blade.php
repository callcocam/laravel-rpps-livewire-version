{{--/**--}}
{{-- * Created by Claudio Campos.--}}
{{-- * User: callcocam@gmail.com, contato@sigasmart.com.br--}}
{{-- * https://www.sigasmart.com.br--}}
{{-- */--}}
<div class="form-group row">
    @include('laravel-livewire-forms::fields.label')
    <div class="col-md-9 col-form-label">
        @foreach($field->options as $value => $label)
            <div class="form-check">
                <input wire:model.lazy="{{ $field->key }}" {{ $field->merge([
                                    'value'=>$value,
                                    'class'=>$field->class,
                                    'id'=> $field->name . '.' . $loop->index
                    ]) }}>
                <label class="form-check-label" for="{{ $field->name . '.' . $loop->index }}">{{$label}}</label>
            </div>
        @endforeach
        @include('laravel-livewire-forms::fields.error-help')
    </div>
</div>
