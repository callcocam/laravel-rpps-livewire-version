<div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header"><i class="fa fa-align-justify"></i> Combined All Table</div>
                <div class="card-body">
                    <table class="table table-responsive-sm table-bordered table-striped table-sm">
                        <thead>
                        <tr>
                            <th>@lang('strings.name')</th>
                            <th>@lang('strings.description')</th>
                            <th>Role</th>
                            <th>Status</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>
                                <input class="form-control" wire:model="name">
                                @error('name') <span class="text-danger">{{ $message }}</span>@enderror
                            </td>
                            <td>
                                <input class="form-control" wire:model="description">
                                @error('description') <span class="text-danger">{{ $message }}</span>@enderror
                            </td>
                            <td colspan="2"><button wire:click="create('{{$group}}')" type="button" class="btn btn-warning btn-block">@lang('strings.save')</button></td>
                        </tr>
                        @if(count($this->form_data))
                            @foreach($this->form_data as $translation)
                                <tr>
                                    <td><input class="form-control" wire:model="form_data.{{$translation['id']}}.name"></td>
                                    <td><input class="form-control" wire:model="form_data.{{$translation['id']}}.description"></td>
                                    <td>Edit</td>
                                    <td>Delete</td>
                                </tr>
                            @endforeach
                        @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- /.col-->
    </div>
    <!-- /.row-->
</div>
