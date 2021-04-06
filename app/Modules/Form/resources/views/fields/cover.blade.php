{{--/**--}}
{{-- * Created by Claudio Campos.--}}
{{-- * User: callcocam@gmail.com, contato@sigasmart.com.br--}}
{{-- * https://www.sigasmart.com.br--}}
{{-- */--}}
<div class="form-group row">
    @include('laravel-livewire-forms::fields.label')
    <div class="col-md-9">
       <div class="row">
           <div class="col-md-8">
               <label class="form-control">
                   <input  {{ $field->merge(['class'=>$field->class]) }}>
                    <span class="custom-file-label ml-3" for="{{ $field->name }}">
                        {{ $form_data[$field->name] }}
                    </span>
               </label>
               @include('laravel-livewire-forms::fields.error-help')
           </div>
           <div class="col-md-4">
               @if(!is_array($form_data[$field->name]))
                   <button type="button" class="btn btn-danger btn-block rounded-full" wire:click="deleteUploadUrl('{{$field->name}}')" ><x-c-icon icon="trash"/>@lang('form.delete-photo')</button>
               @endif
           </div>
       </div>
    </div>
</div>
