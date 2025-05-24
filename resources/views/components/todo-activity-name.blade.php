@props(['activity'])

@php
    $author = $activity->user->name;
    $activityMetadata = explode(':', $activity->name);
    $activityName = $activityMetadata[0];
@endphp

@switch($activityName)
    @case('create')
        <strong>{{ $author }}</strong> created todo
    @break

    @case('completed')
        @php
            $completed = $activityMetadata[1] == 'true' ? true : false;
        @endphp
        <strong>{{ $author }}</strong> marked todo as <x-todo-status-label :completed="$completed" />
    @break

    @default
        Unknown {{ $activityName }}
@endswitch
