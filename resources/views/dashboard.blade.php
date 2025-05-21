<x-layout>
    <h1 class="text-3xl font-bold">Todos</h1>

    <x-create-todo-form />
    <x-todos-table :todos="$todos" />
</x-layout>
