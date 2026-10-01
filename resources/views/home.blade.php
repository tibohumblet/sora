<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-theme="light">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <title>Home</title>
</head>
<body class="font-sans bg-background text-text text-base">

    <x-nav/>

    <div 
        class="pr-12 pl-12 pt-32 pb-32 bg-cover bg-center"
        style="background-image: url('{{ asset('images/background-home-title.svg') }}')"
    >

        <h1 class="font-head text-[clamp(2.2rem,6vw,3.8rem)] font-bold">Share the bright light you saw.</h1>
        <p class="text-lg">Sora is a home for photos people want to keep. Post yours, download theirs, say something kind.</p>

    </div>

</body>
</html>