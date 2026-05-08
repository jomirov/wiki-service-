<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kz-Wiki</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
</head>
<body>
    @include('Components/header')
    @include('Components/post-header')
    <main class="container">
    </main>
    <script>localStorage.setItem("data", @json($data ?? ""))</script>
    <script src="{{ asset('js/script.js') }}"></script>
</body>
</html>