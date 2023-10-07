<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
</head>
<style>
    @font-face {
        font-family: 'Aozora_Mincho_Medium';
        src: url({{ public_path('fonts/Aozora_Mincho_Medium.ttf') }}) format('truetype');
        font-weight: normal;
        font-style: normal;
    }

    body,
    html {
        font-family: 'Aozora_Mincho_Medium';
    }
</style>

<body>
    <p>請求書</p>
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
