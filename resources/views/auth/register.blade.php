<x-layout class="grid place-items-center">
    <form method="POST" action="/register" class="border rounded-xl p-6 flex flex-col">
        @csrf
        <h1 class="text-2xl font-bold">Register</h1>
        <div class="space-y-2 mt-3">
            <x-form-field>
                <x-form-label for="name">Name</x-form-label>
                <x-form-input name='name' id="name" required />
            </x-form-field>
            <x-form-field>
                <x-form-label for="email">Email</x-form-label>
                <x-form-input name='email' id="email" type="email" required />
            </x-form-field>
            <x-form-field>
                <x-form-label for="password">Password</x-form-label>
                <x-form-input name='password' id="password" type="password" required />
            </x-form-field>
        </div>
        <div class="mt-3">
            <a href="/login" class="text-sm text-gray-600">Already registered? Sign in</a>
        </div>

        <x-form-error name="auth" />

        <x-button>Submit</x-button>
    </form>
</x-layout>
