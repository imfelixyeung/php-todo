@props(['todos' => [], 'selectedTodo' => null])

<?php

function formatDate(\DateTime $date)
{
    return $date->format('d M Y');
}

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
                    <th class="text-left">Created</th>
                    <th class="text-left">Updated</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($todos as $todo)
                    <tr class="relative {{ $selectedTodoId == $todo['id'] ? 'bg-gray-200' : 'hover:bg-gray-300' }}">
                        <td>
                            <input type="checkbox" @if ($todo['completed']) checked @endif />
                        </td>
                        <td class="{{ $todo['completed'] ? 'line-through' : '' }}">
                            <a href="/dashboard/todos/{{ $todo['id'] }}?page={{ $todos->currentPage() }}"
                                class="hover:underline after:absolute after:inset-0 after:left-8 after:z-10">{{ $todo['name'] }}</a>
                        </td>
                        <td>
                            <x-todo-status-label completed="{{ $todo['completed'] }}" />
                        </td>
                        <td>{{ formatDate($todo['created_at']) }}</td>
                        <td>{{ formatDate($todo['updated_at']) }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif

    <div class="pagination mt-4">
        {{ $todos->links() }}
    </div>
</div>
