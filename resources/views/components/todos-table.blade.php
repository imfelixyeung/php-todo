@props(['todos' => []])

<div class="border rounded-lg p-2 mt-6">
    @if (count($todos) == 0)
        <div>
            <p>You have no todos yet, create one to get started!</p>
        </div>
    @else
        <table class="w-full">
            <thead>
                <tr>
                    <th></th>
                    <th class="text-left">Name</th>
                    <th class="text-left">Status</th>
                    <th class="text-left">Created</th>
                    <th class="text-left">Updated</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($todos as $todo)
                    <tr>
                        <td>
                            <input type="checkbox" @if ($todo['completed']) checked @endif />
                        </td>
                        <td class="{{ $todo['completed'] ? 'line-through' : '' }}">{{ $todo['name'] }}</td>
                        <td>{{ $todo['completed'] ? 'Done' : 'Todo' }}</td>
                        <td>{{ $todo['created_at']->format('d M Y') }}</td>
                        <td>{{ $todo['updated_at']->format('d M Y') }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

    @endif
</div>
