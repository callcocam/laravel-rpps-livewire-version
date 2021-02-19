{{--/**--}}
{{-- * Created by Claudio Campos.--}}
{{-- * User: callcocam@gmail.com, contato@sigasmart.com.br--}}
{{-- * https://www.sigasmart.com.br--}}
{{-- */--}}
@error($field->key . '.' . $key . '.' . $array_field->name)
    <div class="invalid-feedback d-block" role="alert">
        <strong>{{ $this->errorMessage($message) }}</strong>
    </div>
@elseif($array_field->help)
    <small class="form-text text-muted">{{ $array_field->help }}</small>
@enderror
