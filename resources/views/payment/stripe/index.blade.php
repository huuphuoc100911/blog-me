<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <div style="text-align: center">
        <form action="{{ route('stripe.checkout') }}" method="post">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <button type="submit">Checkout</button>
        </form>
    </div>
</body>

</html>
