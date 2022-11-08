<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/default.css?'.\Carbon\Carbon::now()->format("Y-m-d-H:i:s")) }}">
        <link rel="stylesheet" href="{{ asset('css/module.css?'.\Carbon\Carbon::now()->format("Y-m-d-H:i:s")) }}">
        <link rel="stylesheet" href="{{ asset('css/app.css?'.\Carbon\Carbon::now()->format("Y-m-d-H:i:s")) }}">
        <script src="{{ asset('js/moment-2.24.0.js') }}" defer></script>
        <script src="{{ mix('/js/app.js') }}" defer></script>
        @inertiaHead
    </head>
    <body>
    @inertia
    </body>
</html>
