<x-layout>
    <div class="p-6">
        <h1 class="text-3xl font-bold">Todos</h1>

        <x-create-todo-form />
        <x-todos-table :todos="$todos" />
    </div>
</x-layout>
