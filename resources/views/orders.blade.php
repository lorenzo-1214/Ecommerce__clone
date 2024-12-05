<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ordini</title>
    <!-- Collega il CSS -->
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

</head>
<body>
    @include('layouts.navbar') <!-- Include la navbar -->
    <div class="container mt-5">
        <h1>Questa è la pagina degli ordini</h1>
    </div>
</body>
</html>
