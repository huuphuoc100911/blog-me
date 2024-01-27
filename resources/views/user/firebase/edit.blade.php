@extends('user.layouts.layout')

@section('content')
    <div class="container p-5">
        <h3>Edit</h3>
        <form action="{{ route('firebase.update', $id) }}" method="post">
            @csrf
            @method('put')
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" value="{{ $contact['name'] }}" name="name"
                    placeholder="Enter name">
            </div>
            <div class="form-group">
                <label for="phone">Phone</label>
                <input type="text" class="form-control" name="phone" value="{{ $contact['phone'] }}"
                    placeholder="Enter phone">
            </div>
            <div class="form-group">
                <label for="address">Address</label>
                <input type="text" class="form-control" name="address" value="{{ $contact['address'] }}"
                    placeholder="Enter address">
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection
