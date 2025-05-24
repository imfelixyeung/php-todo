@props(['todo', 'page' => 0])

@php
    use App\Utilities\FormatUtilities;

    $createdAt = App\Utilities\FormatUtilities::formatLongDate($todo['created_at']);
    $updatedAt = App\Utilities\FormatUtilities::formatLongDate($todo['updated_at']);
@endphp

@if ($todo == null)
    <section>

        <h2 class="text-red-600 font-medium">Todo not found</h2>
    </section>
@else
    <section class="flex flex-col justify-between">

        <div>
            <x-todo-status-label completed="{{ $todo['completed'] }}" />

            <h2 class="text-xl font-medium">{{ $todo['name'] }}</h2>
            <p class="text-sm text-gray-600">
                By {{ $todo->user->name }}
                <br />
                Created {{ $createdAt }}
                @if ($updatedAt !== $createdAt)
                    <br />
                    Updated {{ $updatedAt }}
                @endif
            </p>

            <div class="my-3">
                <h3 class="font-medium">Activity</h3>
                <x-todo-activities :activities="$todo->activities" />
            </div>
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
