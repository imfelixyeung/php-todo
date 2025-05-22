@props(['todo'])

<section>

    <h2 class="text-xl font-medium">{{ $todo['name'] }}</h2>
    <p class="text-sm text-gray-600">{{ $todo['created_at'] }}</p>

    <form action="">
        <a href="" class="px-3 py-1 border rounded-sm inline-block">Mark as done</a>
    </form>
    <form action="">
        <a href="" class="px-3 py-1 border rounded-sm inline-block">Delete</a>
    </form>

</section>
