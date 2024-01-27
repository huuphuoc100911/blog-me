@extends('user.layouts.layout')

@section('content')
    <div class="container p-5">
        <a href="{{ route('firebase.create') }}" class="btn btn-info my-3">Add User</a>
        @if (session('success'))
            <p class="alert alert-success">{{ session('success') }}</p>
        @endif
        @if (session('fail'))
            <p class="alert alert-danger">{{ session('fail') }}</p>
        @endif
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Phone</th>
                    <th>Address</th>
                </tr>
            <tbody>
                @forelse ($contacts as $key => $contact)
                    <tr>
                        <td>{{ $key }}</td>
                        <td>{{ $contact['name'] }}</td>
                        <td>{{ $contact['phone'] }}</td>
                        <td>{{ $contact['address'] }}</td>
                        <td>
                            <a href="{{ route('firebase.edit', $key) }}" class="btn btn-success">Edit</a>
                        </td>
                        <td>
                            <a href="{{ route('firebase.delete', $key) }}" class="btn btn-danger">Delete</a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3">No record found</td>
                    </tr>
                @endforelse

            </tbody>
            </thead>
        </table>
    </div>
@endsection
