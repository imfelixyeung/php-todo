<x-layout class="grid place-items-center">
    <form method="POST" action="/login" class="border rounded-xl p-6 flex flex-col">
        @csrf
        <h1 class="text-2xl font-bold">Login</h1>
        <div class="space-y-2 mt-3">
            <x-form-field>
                <x-form-label for="email">Email</x-form-label>
                <x-form-input id="email" type="email" required />
            </x-form-field>
            <x-form-field>
                <x-form-label for="password">Password</x-form-label>
                <x-form-input id="password" type="password" required />
            </x-form-field>
        </div>
        <div class="mt-3">
            <a href="/register" class="text-sm text-gray-600">No account? Register</a>
        </div>

        <x-button>Submit</x-button>
    </form>
</x-layout>
