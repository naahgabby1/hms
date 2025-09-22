<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>{{ucfirst($title)}} - {{ucfirst(config('app.name'))}}</title>
<link rel="shortcut icon" href="{{asset('app_assets/assets/images/favicon.svg')}}">
<link rel="stylesheet" href="{{asset('app_assets/assets/fonts/remix/remixicon.css')}}">
<link rel="stylesheet" href="{{asset('app_assets/assets/css/main.min.css')}}">
</head>
<body class="login-bg">
@yield('content')
</body>
</html>
