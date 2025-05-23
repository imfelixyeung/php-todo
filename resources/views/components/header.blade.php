<header class="border-b bg-gray-100 px-6">
    <div class="flex items-center min-h-14 justify-between">
        <div class="text-xl font-medium">
            Php Todo
        </div>
        <div class="flex gap-3">
            @guest()
                <a href="/login" class="block">Login</a>
                <a href="/register" class="block">Register</a>
            @endguest
            @auth
                <div>Hello, {{ auth()->user()->name }}!</div>
                <form method="POST" action="/logout">
                    @csrf
                    <button class="cursor-pointer">Log out</button>
                </form>
                {{-- todo: implement user's name --}}
            @endauth
        </div>
    </div>
</header>
