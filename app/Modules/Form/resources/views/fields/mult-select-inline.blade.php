<div class="form-group row">
    <label class="col-md-3 col-form-label" for="{{ $field->name }}"> {{ $field->label }}</label>
    <div class="col-9">
        <div class="c-multi-select c-multi-select-multiple c-multi-select-inline">
            <span class="c-multi-select-selection">{{ $this->ValueOptionsCount }} item(s) selected</span>
            <input wire:model="MultselectSearch" class="c-multi-select-search" placeholder="Search">
            @if($field->options)
                <div class="c-multi-select-options">
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
