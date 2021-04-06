<tr>
    @foreach($columns as $column)
        @if ($column->isVisible())
                <th {{ $this->merge($this->setTableHeadAttributes($column->getAttribute())) }}
                @if($column->isSortable())
                    wire:click="sort('{{ $column->getAttribute() }}')"
                    style="cursor:pointer;"
                @endif
                >
                @lang(sprintf('strings.%s',$column->getText()))
                  @include(table_includes('columns-attributes.sort'))
                </th>
        @endif
    @endforeach
</tr>
