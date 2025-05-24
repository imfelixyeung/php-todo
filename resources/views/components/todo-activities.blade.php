@props(['activities'])

<div class="space-y-1">

    @foreach ($activities as $activity)
        <div>
            <div>
                <x-todo-activity-name :activity="$activity" />
            </div>
            <div class="text-sm text-gray-600">
                {{ App\Utilities\FormatUtilities::formatLongDate($activity['created_at']) }}
            </div>
        </div>
    @endforeach

</div>
