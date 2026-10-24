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

                <div class="mb-4">
                    <label for="email" class="block text-sm font-medium text-text">Email</label>
                    <input type="email" name="email" id="email" required class="mt-1 w-full rounded-md border border-border bg-card px-3 py-2 text-text placeholder:text-muted-text focus:outline-none focus:ring-2 focus:ring-accent-2 focus:border-accent-2">

                    @error('email')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="password" class="block text-sm font-medium text-text">
                        Password
                    </label>

                    <div class="relative">
                        <input
                            type="password"
                            name="password"
                            id="password"
                            required
                            class="mt-1 w-full rounded-md border border-border bg-card px-3 py-2 pr-10 text-text placeholder:text-muted-text focus:outline-none focus:ring-2 focus:ring-accent-2 focus:border-accent-2"
                        >

                        <button
                            type="button"
                            id="togglePassword"
                            class="absolute inset-y-0 right-0 flex items-center px-3 text-muted-text hover:text-text"
                            aria-label="Show password"
                        >
                            <!-- Eye icon -->
                            <svg id="eyeIcon" xmlns="http://www.w3.org/2000/svg"
                                class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                            </svg>
                        </button>
                    </div>

                    <ul class="mt-2 list-disc list-inside">
                        <li id="length" class="text-sm text-red-500">Minimum 8 characters</li>
                        <li id="uppercase" class="text-sm text-red-500">At least one uppercase letter</li>
                        <li id="lowercase" class="text-sm text-red-500">At least one lowercase letter</li>
                        <li id="number" class="text-sm text-red-500">At least one number</li>
                        <li id="special" class="text-sm text-red-500">At least one special character (!@#$%^&*)</li>
                    </ul>
                </div>

                <script>
                    const password = document.getElementById('password');
                    const togglePassword = document.getElementById('togglePassword');

                    togglePassword.addEventListener('click', function () {
                        const isHidden = password.type === 'password';

                        password.type = isHidden ? 'text' : 'password';
                        togglePassword.setAttribute(
                            'aria-label',
                            isHidden ? 'Hide password' : 'Show password'
                        );

                        // Switch between eye and eye-off icons
                        document.getElementById('eyeIcon').innerHTML = isHidden
                            ? `<path stroke-linecap="round" stroke-linejoin="round"
                                d="M3 3l18 18M10.584 10.587a2 2 0 002.829 2.829" />
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M9.88 5.09A10.94 10.94 0 0112 4.9c4.478 0 8.268 2.943 9.542 7a11.96 11.96 0 01-4.04 5.45M6.61 6.61A11.96 11.96 0 002.458 12c1.274 4.057 5.064 7 9.542 7 1.16 0 2.27-.207 3.3-.587" />`
                            : `<path stroke-linecap="round" stroke-linejoin="round"
                                d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />`;
                    });

                    password.addEventListener('input', function () {
                        const value = password.value;

                        const requirements = {
                            length: value.length >= 8,
                            uppercase: /[A-Z]/.test(value),
                            lowercase: /[a-z]/.test(value),
                            number: /[0-9]/.test(value),
                            special: /[^a-zA-Z0-9]/.test(value)
                        };

                        for (const [id, valid] of Object.entries(requirements)) {
                            const item = document.getElementById(id);
                            item.classList.toggle('text-green-500', valid);
                            item.classList.toggle('text-red-500', !valid);
                        }
                    });
                </script>

                <button type="submit" class="w-full py-2 px-4 bg-accent-1 text-text font-semibold rounded-full hover:opacity-90 focus:outline-none focus:ring-2 focus:ring-accent-2 focus:ring-offset-2 focus:ring-offset-background">
                    Sign Up
                </button>
            </form>
        </div>

</body>
</html>