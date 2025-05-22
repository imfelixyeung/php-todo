@props(['completed'])

<div>
    @if ($completed)
        <span class="text-green-600">Done</span>
    @else
        <span class="text-amber-600">Todo</span>
    @endif
</div>
