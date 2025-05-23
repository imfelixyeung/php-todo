@props(['todos' => [], 'selectedTodo' => null])

<h1 class="text-3xl font-bold">Todos</h1>

@can('create', App\Models\Todo::class)
    <x-create-todo-form />
@endcan
<x-todos-table :todos="$todos" page="{{ $todos->currentPage() }}" :selectedTodo="$selectedTodo" />
