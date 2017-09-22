<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="index, follow">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="">

    <title>{{ $title }}</title>

</head>
<body>
{{ $menu }}
<img src="{{$logo}}" alt="">
@yield('content')
</body>
</html>