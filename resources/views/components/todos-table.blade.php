@props(['todos' => [], 'selectedTodo' => null, 'page' => 0])

<?php

$selectedTodoId = $selectedTodo ? $selectedTodo['id'] : null;

?>

<div class="border rounded-lg p-2 mt-6">
    @if (count($todos) == 0)
        <div>
            <p>You have no todos yet, create one to get started!</p>
        </div>
    @else
        <table class="w-full">
            <thead>
                <tr>
                    <th class="w-8"></th>
                    <th class="text-left">Name</th>
                    <th class="text-left">Status</th>
                    <th class="text-left">Owner</th>
                    <th class="text-left">Created</th>
                    <th class="text-left">Updated</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($todos as $todo)
                    <tr class="relative {{ $selectedTodoId == $todo['id'] ? 'bg-gray-200' : 'hover:bg-gray-300' }}">
                        <td>
                            <form method="POST" action="/dashboard/todos/{{ $todo['id'] }}">
                                @csrf
                                @method('PATCH')
                                <x-form-page page="{{ $page }}" />
                                <input type="checkbox" @if ($todo['completed']) checked @endif
                                    onchange="this.form.submit(); this.disabled = true;"
                                    @cannot('update', $todo)
                                        disabled
                                    @endcannot />
                                <input name="completed" type="checkbox" @if (!$todo['completed']) checked @endif
                                    hidden />
                                <button type="submit" class="sr-only">Mark as
                                    <x-todo-status-label completed="{{ !$todo['completed'] }}" /></button>
                            </form>
                        </td>
                        <td class="{{ $todo['completed'] ? 'line-through' : '' }}">
                            <a @if ($todo->is($selectedTodo)) href="/dashboard?page={{ $todos->currentPage() }}" @else href="/dashboard/todos/{{ $todo['id'] }}?page={{ $todos->currentPage() }}" @endif
                                class="hover:underline after:absolute after:inset-0 after:left-8 after:z-10">{{ $todo['name'] }}</a>
                        </td>
                        <td>
                            <x-todo-status-label completed="{{ $todo['completed'] }}" />
                        </td>
                        <td>{{ $todo->user->name }}</td>
                        <td>{{ App\Utilities\FormatUtilities::formatDate($todo['created_at']) }}</td>
                        <td>{{ App\Utilities\FormatUtilities::formatDate($todo['updated_at']) }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif

    <div class="pagination mt-4">
        {{ $todos->links() }}
    </div>
</div>
