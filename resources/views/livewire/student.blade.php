<div>
    <!-- Button trigger modal -->
    <button type="button" wire:click="resetInput" class="btn btn-primary my-3" data-bs-toggle="modal"
        data-bs-target="#student-modal">
        Add Student
    </button>

    <input type="search" placeholder="Search..." wire:model='search' class="form-control my-3 float-end"
        style="width: 500px">

    @include('livewire.student-modal')

    @if (session()->has('message'))
        <h5 class="alert alert-success">{{ session('message') }}</h5>
    @endif

    <h4 class="my-2">List Student</h4>
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Phone Number</th>
                <th scope="col">Address</th>
                <th scope="col">City</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($students as $student)
                <tr>
                    <td>{{ $student->name }}</td>
                    <td>{{ $student->email }}</td>
                    <td>{{ $student->phone_number }}</td>
                    <td>{{ $student->address }}</td>
                    <td>{{ $student->city }}</td>
                    <td style="display:flex; gap: 10px">
                        <button type="button" wire:click="editStudent({{ $student->id }})" class="btn btn-primary"
                            data-bs-toggle="modal" data-bs-target="#update-student-modal">Edit</button>
                        <button type="button" wire:click="deleteStudent({{ $student->id }})" class="btn btn-danger"
                            data-bs-toggle="modal" data-bs-target="#delete-student-modal">Delete</button>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5">Không có record</td>
                </tr>
            @endforelse

        </tbody>
    </table>
    {{ $students->links() }}
</div>
