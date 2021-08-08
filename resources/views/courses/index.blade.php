<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Courses') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                @foreach($courses as $course)
                <div class="bg-white overflow-hidden p-4 sm:p-6 lg:p-8">
                    {{$course->name}}
                </div>
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>