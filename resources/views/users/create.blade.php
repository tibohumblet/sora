<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-theme="light">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <title>Sign Up</title>
</head>
<body class="font-sans bg-background text-text text-base">

    <x-nav/>

    @if (@session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
            <strong class="font-bold">Success! </strong>
            <span class="block sm:inline">{{ session('success') }}</span>
        </div>
    @endif

    <div class="flex justify-center items-center h-screen">
        <div class="w-full max-w-md p-8 bg-background border border-border rounded-lg shadow-md">
            <h1 class="text-2xl font-bold mb-6">Sign Up</h1>
            <form method="POST" action="{{ route('users.store') }}">
                @csrf
                
                {{-- //TO-DO: change the color for darkmode --}}

                <div class="mb-4">
                    <label for="email" class="block text-sm font-medium text-text">Email</label>
                    <input type="email" name="email" id="email" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-accent-1 focus:ring focus:ring-accent-1 focus:ring-opacity-50">

                    @error('email')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="password" class="block text-sm font-medium text-text">Password</label>
                    <input type="password" name="password" id="password" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-accent-1 focus:ring focus:ring-accent-1 focus:ring-opacity-50">
                   
                    @error('password')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>
                <button type="submit" class="w-full py-2 px-4 bg-accent-1 text-white font-semibold rounded-md hover:bg-accent-2 focus:outline-none focus:ring focus:ring-accent-1 focus:ring-opacity-50">Sign Up</button>
            </form>
        </div>

</body>
</html>