<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Todo</title>

    <x-tailwindcss />
</head>

<body>
    <div id="app" class="min-h-screen grid grid-rows-[auto_1fr]">
        <x-header />
        <main>
            {{ $slot }}
        </main>
    </div>
</body>

</html>
