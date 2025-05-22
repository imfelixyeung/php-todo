<form method="POST" action="/dashboard/todos/create">
    @csrf
    <div class="grid grid-cols-[auto_1fr_auto] max-w-96 w-full border rounded-lg">
        <label for="newTodoName" class="block px-2 py-1 border-r">New Todo</label>
        <input name="name" id="newTodoName" placeholder="Bake a cake.." class="px-2 py-1" required minlength="1"
            maxlength="128" />
        <button type="submit" class="px-2 py-1 border-l cursor-pointer">Create</button>
    </div>
</form>
