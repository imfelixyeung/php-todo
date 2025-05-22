<x-layout>
    <div class="grid grid-cols-[auto_20rem] h-full">
        <div class="p-6">
            <h1 class="text-3xl font-bold">Todos</h1>

            <x-create-todo-form />
            <x-todos-table :todos="$todos" :selectedTodo="$todo" />
        </div>
        <div class="px-6 pb-6 pt-12 border-l relative">
            <a href="/dashboard?page={{ $todos->currentPage() }}" class="absolute top-3 left-6">Close</a>
            <x-todo-details :todo="$todo" page="{{ $todos->currentPage() }}" />
        </div>
    </div>
</x-layout>
