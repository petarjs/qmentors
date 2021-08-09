<x-app-layout>

    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Courses') }}
            </h2>
            @can('create courses')
                @if(count($courses) > 0)
                    <x-button as="a" :href="route('courses.create')" icon="plus">
                        New Course
                    </x-button>
                @endif
            @endcan
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <x-courses.list :courses="$courses"/>
            </div>
        </div>
    </div>
</x-app-layout>
