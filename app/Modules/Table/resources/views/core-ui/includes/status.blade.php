<span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full {{ $column->getStatusClass(data_get($model, $column->getAttribute())) }}">
   @lang(sprintf('strings.%s', status( data_get($model, $column->getAttribute()))))
</span>
