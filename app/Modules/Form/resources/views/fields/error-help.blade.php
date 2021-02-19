{{--/**--}}
{{-- * Created by Claudio Campos.--}}
{{-- * User: callcocam@gmail.com, contato@sigasmart.com.br--}}
{{-- * https://www.sigasmart.com.br--}}
{{-- */--}}
@error($field->key)
    <div class="w-full text-sm text-red-500 font-bold" role="alert">
<strong>{{ $this->errorMessage($message) }}</strong>
</div>
@elseif($field->help)
    <small class="flex form-text text-muted">{{ $field->help }}</small>
@enderror
