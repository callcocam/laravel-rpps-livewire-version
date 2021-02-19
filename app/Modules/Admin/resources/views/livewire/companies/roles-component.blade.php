<div>
    <table class="table table-striped table-sm">
        <tr>
            <td>Name</td>
        </tr>
        @if($this->roles)
            @foreach($this->roles as $role)
                <tr>
                    <td>{{ $role->name }}</td>
                </tr>
            @endforeach
        @endif
    </table>

</div>
