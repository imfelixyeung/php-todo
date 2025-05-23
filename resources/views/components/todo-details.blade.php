@props(['todo', 'page' => 0])

@if ($todo == null)
    <section>

        <h2 class="text-red-600 font-medium">Todo not found</h2>
    </section>
@else
    <section class="flex flex-col justify-between">

        <div>
            <x-todo-status-label completed="{{ $todo['completed'] }}" />

            <h2 class="text-xl font-medium">{{ $todo['name'] }}</h2>
            <p class="text-sm text-gray-600">{{ $todo['created_at'] }}</p>
        </div>

        <div class="flex gap-2 flex-wrap">
            @can('update', $todo)
                <form method="POST" action="/dashboard/todos/{{ $todo['id'] }}">
                    @csrf
                    @method('PATCH')
                    <x-form-page page="{{ $page }}" />
                    <input name="completed" type="checkbox" @if (!$todo['completed']) checked @endif hidden />
                    <x-button type="submit">Mark as <x-todo-status-label
                            completed="{{ !$todo['completed'] }}" /></x-button>
                </form>
            @endcan
            @can('delete', $todo)
                <form method="POST" action="/dashboard/todos/{{ $todo['id'] }}">
                    @csrf
                    @method('DELETE')
                    <x-form-page page="{{ $page }}" />
                    <x-button type="submit">Delete</x-button>
                </form>
            @endcan
        </div>

    </section>
@endif
