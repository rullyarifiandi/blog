<!DOCTYPE html>
<html lang="en"
x-data="{ darkMode: localStorage.getItem('dark') === 'true'}"
x-init="$watch('darkMode', val => localStorage.setItem('dark', val))"
x-bind:class="{ 'dark': darkMode }">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('favicon/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('favicon/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('favicon/favicon-16x16.png') }}">
    <link rel="manifest" href="{{ asset('favicon/site.webmanifest') }}">
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    {{ $style }}
    <script src="{{ mix('js/app.js') }}" defer></script>
    {{ $script }}
    <title>{{ env('APP_NAME') }} - {{ $title }}</title>
</head>
<body class="flex flex-col justify-between min-h-screen font-sans antialiased bg-gray-200 dark:bg-gray-800">
    <x-navigation></x-navigation>
    <main class="flex-auto">
        <div class="flex justify-center">
            <div class="container w-3/12 pt-20 pb-2 mx-auto">
                <x-alert></x-alert>
                {{ $slot }}
            </div>
        </div>
    </main>
    <x-footer></x-footer>
</body>
</html>
