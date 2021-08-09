@props(['courses'])

<div class="bg-white shadow overflow-hidden sm:rounded-md">
    <ul class="divide-y divide-gray-200">
        @forelse($courses as $course)
            <li>
                <x-courses.list-item :course="$course"/>
            </li>
        @empty
            <li>
                <x-empty-state>
                    <x-slot name="title">No courses</x-slot>
                    <x-slot name="message">There are no courses yet</x-slot>
                    <x-slot name="button">
                        <x-button as="a" :href="route('courses.create')" icon="plus">
                            New Course
                        </x-button>
                    </x-slot>
                </x-empty-state>
            </li>
        @endforelse
    </ul>
</div>
