
<nav class="flex items-center justify-between bg-background p-6 pr-12 pl-12 text-text text-base border-b border-border rounded-none">

    <a href="{{ route("home") }}" class="flex text-3xl font-bold">
        <span class="block w-3 h-3 rounded-lg bg-accent-1"></span>
        Sora
    </a>

    <div class="flex items-center gap-6 font-semibold">

        <a href="{{ route("home") }}">Home</a>
        <x-dark-mode-btn/>

    </div>

</nav>