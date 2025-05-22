<x-layout>
    <div class="grid grid-cols-[auto_20rem] h-full">
        <div class="p-6">
            <h1 class="text-3xl font-bold">Todos</h1>

            <x-create-todo-form />
            <x-todos-table :todos="$todos" />
        </div>
        <div class="p-6 border-l relative">
            <a href="/dashboard" class="absolute top-6 right-6">Close</a>
            <x-todo-details :todo="$todo" />
        </div>
    </div>
</x-layout>
