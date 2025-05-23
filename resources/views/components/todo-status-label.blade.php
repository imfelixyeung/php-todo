@props(['completed'])

<span>
    @if ($completed)
        <span class="text-todo-complete">Done</span>
    @else
        <span class="text-todo-pending">Todo</span>
    @endif
</span>
