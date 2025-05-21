<x-layout>
    <h1 class="text-3xl font-bold">Todos</h1>

    <div class="border rounded-lg p-2 mt-6">
        <table class="w-full">
            <thead>
                <tr>
                    <th></th>
                    <th class="text-left">Name</th>
                    <th class="text-left">Status</th>
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
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-layout>
