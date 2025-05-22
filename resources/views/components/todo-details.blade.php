@props(['todo'])

<section>

    <h2 class="text-xl font-medium">{{ $todo['name'] }}</h2>
    <p class="text-sm text-gray-600">{{ $todo['created_at'] }}</p>

    <form action="">
        <input name="todoId" value="{{ $todo['id'] }}" hidden />
        <input name="action" value="mark:done" hidden />
        <button type="submit" class="px-3 py-1 border rounded-sm inline-block">Mark as done</button>
    </form>
    <form action="">
        <input name="todoId" value="{{ $todo['id'] }}" hidden />
        <input name="action" value="delete" hidden />
        <button type="submit" class="px-3 py-1 border rounded-sm inline-block">Delete</button>
    </form>

</section>
