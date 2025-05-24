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
    <section class="flex flex-col">

        <div class="p-6 pt-12 grow">
            <x-todo-status-label completed="{{ $todo['completed'] }}" />

            <h2 class="text-xl font-medium">{{ $todo['name'] }}</h2>

            <div class="my-3">
                <h3 class="font-base">Created</h3>
                <div class="text-gray-600 text-sm">{{ $createdAt }}</div>
            </div>

            @if ($updatedAt !== $createdAt)
                <div class="my-3">
                    <h3 class="font-base">Updated</h3>
                    <div class="text-gray-600 text-sm">{{ $updatedAt }}</div>
                </div>
            @endif

            <div class="my-3">
                <h3 class="font-base">Owner</h3>
                <div class="text-gray-600 text-sm">{{ $todo->user->name }}</div>
            </div>

            <div class="my-3">
                <h3 class="font-base">Activity</h3>
                <x-todo-activities :activities="$todo->activities" />
            </div>
        </div>


        @canany(['update', 'delete'], $todo)
            <div class="flex gap-2 flex-wrap sticky bottom-0 inset-x-0 bg-white border-t px-6 py-3">
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
        @endcanany


    </section>
@endif
