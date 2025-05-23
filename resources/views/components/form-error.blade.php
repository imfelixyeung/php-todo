@props(['name'])

@error($name)
    <div class="text-red-600">{{ $message }}</div>
@enderror
