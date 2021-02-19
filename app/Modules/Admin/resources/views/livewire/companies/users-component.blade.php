<div>
    <table class="table table-striped table-sm">
        <tr>
            <td>Name</td>
        </tr>
        @if($this->users)
            @foreach($this->users as $user)
                <tr>
                    <td>{{ $user->name }}</td>
                </tr>
            @endforeach
        @endif
    </table>

</div>
