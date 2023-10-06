<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <link rel="stylesheet" href="/assets/user/css/bootstrap.min.css" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Be%20Vietnam' rel='stylesheet'>
</head>
<style>
    body,
    html {
        font-family: 'Be Vietnam';
    }
</style>

<body>
    <table class="table table-bordered" id="laravel_crud">
        <thead>
            <tr>
                <th>Username</th>
                <th>Email</th>
                <th>Role</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($staffs as $staff)
                <tr>
                    <td><strong>{{ $staff->name }}</strong></td>
                    <td>{{ $staff->email }}</td>
                    <td class="text-primary">
                        Staff
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>
