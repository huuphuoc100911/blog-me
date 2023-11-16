@extends('user.layouts.layout')
@section('content')
<section class="services-section services-normal spad">
    <div class="container">
        <div class="info">
            {{-- <h3>Tổng user active: {{ $data['userCount'][0]->user_count }}</h3> --}}
        </div>
        <hr>
        <h3 class="m-3">{{ __('CStudent::custom.list-user', ['name' => 'Huu Phuoc']) }}</h3>
        <div class="row">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Created at</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($testModuleUser as $key => $user)
                        <tr>
                            <th scope="row">{{ $key + 1 }}</th>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->created_at }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</section>
@endsection