<div class="list-user-livewire row">
    <div class="col-4">
        <input wire:model="search" type="text" class="form-control" placeholder="Search users..." />
    </div>

    <button class="col-4 btn btn-success" wire:click="handleClick">Click Wire</button>

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
