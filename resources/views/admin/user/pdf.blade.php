{{-- <!DOCTYPE html>
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
                        Staffa
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html> --}}

<!DOCTYPE html>
<html>

<head>
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

        #customers {
            font-family: Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        #customers td,
        #customers th {
            border: 1px solid #ddd;
            padding: 8px;
        }

        #customers tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        #customers tr:hover {
            background-color: #ddd;
        }

        #customers th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: left;
            background-color: #04AA6D;
            color: white;
        }
    </style>
</head>

<body>
    <h1>{{ $title }}</h1>
    <p>請求書</p>

    <table id="customers">
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
