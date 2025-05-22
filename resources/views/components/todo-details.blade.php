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
            <form method="POST" action="/dashboard/todos/{{ $todo['id'] }}/update">
                @csrf
                <x-form-page page="{{ $page }}" />
                <input name="todoId" value="{{ $todo['id'] }}" hidden />
                <input name="completed" type="checkbox" @if (!$todo['completed']) checked @endif hidden />
                <button type="submit" class="px-3 py-1 border rounded-sm inline-block">Mark as done</button>
            </form>
            <form method="POST" action="/dashboard/todos/{{ $todo['id'] }}/delete">
                @csrf
                <x-form-page page="{{ $page }}" />
                <input name="todoId" value="{{ $todo['id'] }}" hidden />
                <button type="submit" class="px-3 py-1 border rounded-sm inline-block">Delete</button>
            </form>
        </div>

    </section>
@endif
