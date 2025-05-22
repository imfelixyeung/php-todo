<x-layout>
    <div class="grid grid-cols-[auto_20rem] h-full">
        <div class="p-6">
            <h1 class="text-3xl font-bold">Todos</h1>

            <x-create-todo-form />
            <x-todos-table :todos="$todos" />
        </div>
        <div class="px-6 pb-6 pt-12 border-l relative">
            <a href="/dashboard" class="absolute top-3 left-6">Close</a>
            <x-todo-details :todo="$todo" />
        </div>
    </div>
</x-layout>
