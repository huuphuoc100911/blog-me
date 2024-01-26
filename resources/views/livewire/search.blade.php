<div class="list-user-livewire row">
    <input wire:model="search" type="text" class="form-control col-4" placeholder="Search users..." />

    <table class="table col-12">
        <thead>
            <th>Tên</th>
            <th>Email</th>
            <th>Ngày tạo</th>
        </thead>
        @foreach ($users as $user)
            <tr>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->created_time }}</td>
            </tr>
        @endforeach
    </table>
</div>
