<div class="container-fluid">
    <h2>Sortable table</h2>
    <table class="table table-sortable">
        <thead>
        <tr>
            <th>@lang('landlord.menu.manager.table.ordering')</th>
            <th>@lang('landlord.menu.manager.table.name')</th>
            <th>Last Name</th>
            <th>Username</th>
        </tr>
        </thead>
        <tbody wire:sortable="updateGroupOrder" wire:sortable-group="updateTaskOrder">
        @foreach ($this->groups as $group)
            <tr wire:key="group-{{ $group->id }}" wire:sortable.item="{{ $group->id }}">
                <td>{{ $group->ordering }}</td>
                <td wire:sortable.handle>{{ $group->name }}</td>
                <td>Otto</td>
                <td>
                    <button class="btn btn-danger btn-sm" wire:click="removeGroup({{ $group->id }})">Remove</button>
                </td>
            </tr>
            @if($group->sub_menus)
                <tr>
                    <td colspan="4">
                        <table wire:sortable-group.item-group="{{ $group->id }}">
                            @foreach ($group->sub_menus as $submenu)
                                <tr wire:key="task-{{ $submenu->id }}" wire:sortable-group.item="{{ $submenu->id }}">
                                    <td><span class="fas fa-move"></span> 1</td>
                                    <td> {{ $submenu->name }}</td>
                                    <td>Otto</td>
                                    <td>
                                        <button wire:click="removeTask({{ $submenu->id }})">Remove</button>
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    </td>
                </tr>
            @endif
            <tr>
                <td colspan="4">
                    <form class="form-inline" wire:submit.prevent="addTask({{ $group->id }}, $event.target.name.value)">
                        <input class="form-control" type="text" name="name">
                        <input class="form-control" type="text" name="name">
                        <input class="form-control" type="text" name="name">
                        <button class="btn btn-success btn-sm">Add Task</button>
                    </form>
                </td>
            </tr>
        @endforeach
        <tr>
            <td colspan="4">
                <form class="form-inline" wire:submit.prevent="addGroup">
                    <input class="form-control" type="text" wire:model="newGroupLabel">
                    <button class="btn btn-success btn-sm">Add Task Group</button>
                </form>
            </td>
        </tr>
        </tbody>
    </table>
</div>
