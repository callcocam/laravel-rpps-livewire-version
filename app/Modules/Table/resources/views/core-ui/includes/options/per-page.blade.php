<div class="col-md-3 col-sm-12">
    <div class="input-group">
        <label for="perPage" class="col-form-label"> @lang('strings.per_page'):&nbsp;</label>
        <select wire:model="perPage" id="perPage" class="form-control ">
            @foreach ($perPageOptions as $option)
                <option>{{ $option }}</option>
            @endforeach
        </select>
    </div>
</div>
