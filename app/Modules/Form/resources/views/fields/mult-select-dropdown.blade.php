<div class="form-group row" x-data="{open: false}" @click.away="open = false" @close.stop="open = false">
    @include('laravel-livewire-forms::fields.label')
    <div class="col-9" @click="open=true">
        <div class="c-multi-select c-multi-select-multiple c-multi-select-selection-tags" :class="{'c-show':open}">
            @if($this->ValueOptions)
                <span class="c-multi-select-selection" style="">
                    @foreach($this->ValueOptions as $key => $ValueOptions)
                        <span class="c-multi-select-tag" data-value="{{ $ValueOptions }}">{{ $ValueOptions }}
                            <span class="c-multi-select-tag-delete close" aria-label="Close">
                                <span aria-hidden="true"
                                      wire:click="removeMutSelect('{{ $key }}','{{$field->name}}')">×</span>
                            </span>
                        </span>
                    @endforeach
                </span>
            @endif
            <input wire:model="MultselectSearch.{{ $field->name }}" class="c-multi-select-search" placeholder="Search"
                   autofocus>
            @if($field->options)
                <div class="c-multi-select-options overflow-y-auto h-100">
                    @foreach($field->options as $value => $label)
                        <div class="c-multi-select-option {{ $this->isSelected($value) }}"
                             wire:click="setMultSelectValue('{{ $value }}','{{$label}}','{{$field->name}}')"
                             tabindex="0">{{ $label }}</div>
                    @endforeach
                </div>
            @endif
        </div>
    </div>
</div>
