@props(['mentors'])

<div class="flex flex-col">
    <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
        <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
            <div class="overflow-hidden">
                @empty($mentors)
                    <x-empty-state>
                        <x-slot name="title">No mentors</x-slot>
                        <x-slot name="message">There are no mentors yet</x-slot>
                        <x-slot name="button">
                            <x-button as="a" :href="route('courses.create')" icon="plus">
                                Invite a mentor
                            </x-button>
                        </x-slot>
                    </x-empty-state>
                @else
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                        <tr>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Name
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Role
                            </th>
                            <th scope="col" class="relative px-6 py-3">
                                <span class="sr-only"> Edit</span>
                            </th>
                        </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                        @foreach($mentors as $mentor)
                            <x-mentors.list-item :mentor="$mentor"/>
                        @endforeach
                        </tbody>
                    </table>
                    <x-pagination :pagination="$mentors"/>
                @endempty
            </div>
        </div>
    </div>
</div>
