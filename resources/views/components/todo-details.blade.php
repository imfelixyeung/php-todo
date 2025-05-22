@props(['todo'])

@if ($todo == null)
    <section>

        <h2 class="text-red-600 font-medium">Todo not found</h2>
    </section>
@else
    <section>

        <div>
            @if ($todo['completed'])
                <span class="text-green-600">Done</span>
            @else
                <span class="text-amber-600">Todo</span>
            @endif
        </div>

        <h2 class="text-xl font-medium">{{ $todo['name'] }}</h2>
        <p class="text-sm text-gray-600">{{ $todo['created_at'] }}</p>

        <form method="POST" action="/dashboard/todos/{{ $todo['id'] }}/update">
            @csrf
            <input name="todoId" value="{{ $todo['id'] }}" hidden />
            <input name="completed" type="checkbox" @if (!$todo['completed']) checked @endif hidden />
            <button type="submit" class="px-3 py-1 border rounded-sm inline-block">Mark as done</button>
        </form>
        <form method="POST" action="/dashboard/todos/{{ $todo['id'] }}/delete">
            @csrf
            <input name="todoId" value="{{ $todo['id'] }}" hidden />
            <button type="submit" class="px-3 py-1 border rounded-sm inline-block">Delete</button>
        </form>

    </section>
@endif
