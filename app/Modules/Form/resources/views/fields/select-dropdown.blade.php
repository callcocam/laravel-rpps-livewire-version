<div class="form-group row" x-data="{open: false}" @click.away="open = false" @close.stop="open = false">
    @include('laravel-livewire-forms::fields.label')
    <div class="col-md-9" @click="open=true">
        <div class="c-multi-select" :class="{'c-show':open}">
            @isset($this->SingleselectSelected[$field->name])
                <span class="c-multi-select-selection mr-4" x-show="!open">{{ $this->SingleselectSelected[$field->name] }}</span>
            @endisset
            <input wire:model="SingleselectSearch.{{ $field->name }}" class="c-multi-select-search" autocomplete="off">
            @if($field->options)
                <div class="c-multi-select-options  overflow-auto" style="height: 200px;" @click="open = false">
                    @foreach($field->options as $value => $label)
                        <div class="c-multi-select-option {{ $this->isSingleSelected($value,$field->name) }}"
                             wire:click="setSingleSelectValue('{{ $value }}','{{ $label }}','{{$field->name}}')"
                        >{{ $label }}</div>
                    @endforeach
                </div>
            @endif
        </div>
        @include('laravel-livewire-forms::fields.error-help')
    </div>
</div>
