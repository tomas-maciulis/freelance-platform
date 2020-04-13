<!DOCTYPE html>

<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<link href="{{ asset('css/app.css') }}" rel="stylesheet" />
<script type="text/javascript" src="{{ asset('js/app.js') }}"></script>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Freelance Platform</title>
</head>
<body>
<div class="app-container app-theme-white body-tabs-shadow fixed-header fixed-sidebar">
    @include('navbar')
    <div class="app-main ignore-scrollbar-width">
        @yield('layout')
    </div>
</div>
</body>
</html>
