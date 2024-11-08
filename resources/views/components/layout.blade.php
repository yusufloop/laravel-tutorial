<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title }}</title>
</head>

<body>

    <x-header>
        <div>
            <a href="{{ route('index') }}">Home</a>
            <a href="{{ route('about') }}">About</a>
            <a href="{{ route('task') }}">Task</a>
        </div>
    </x-header>

    <main>
        @include('components.body')
    </main>

    <x-footer>
        created by Yusuf
    </x-footer>
</body>
</html>
