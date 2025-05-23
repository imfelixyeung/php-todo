<x-layout>
    <div class="grid grid-cols-1 grid-rows-[auto_auto] md:grid-cols-[auto_20rem] md:grid-rows-1 h-full">
        <div
            class="px-6 pb-6 pt-12 md:border-l border-b md:border-b-0 relative grid grid-rows-[1fr] md:col-start-2 md:col-span-1 md:row-start-1">
            <a href="/dashboard?page={{ $todos->currentPage() }}" class="absolute top-3 left-6">Close</a>
            <x-todo-details :todo="$todo" page="{{ $todos->currentPage() }}" />
        </div>
        <div class="p-6 md:col-start-1 md:col-span-1 md:row-start-1">
            <h1 class="text-3xl font-bold">Todos</h1>

            @can('create-todo')
                <x-create-todo-form />
            @endcan
            <x-todos-table :todos="$todos" :selectedTodo="$todo" page="{{ $todos->currentPage() }}" />
        </div>
    </div>
</x-layout>
