<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Yönetim Paneli</title>
{{--    <link rel="shortcut icon" href="{{ asset('assets/image') }}">--}}
    <link rel="stylesheet" href="{{ asset('assets/css/icons.min.css') }}"/>
    <link rel="stylesheet" href="{{ asset('assets/css/app.min.css') }}" id="light-style"/>
    <link rel="stylesheet" href="{{ asset('assets/css/app-dark.min.css') }}" id="dark-style"/>
    <link rel="stylesheet" href="{{ asset('assets/css/base.css') }}"/>
    @stack('styles')
</head>
