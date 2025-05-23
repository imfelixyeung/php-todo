<x-layout>
    <div class="p-6">
        <h1 class="text-3xl font-bold">Todos</h1>

        @can('create-todo')
            <x-create-todo-form />
        @endcan
        <x-todos-table :todos="$todos" page="{{ $todos->currentPage() }}" />
    </div>
</x-layout>
