@push('head')
    @trixassets
@endpush

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Courses') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="flex-1 flex items-stretch overflow-hidden">
                    <main class="flex-1 overflow-y-auto">
                        <!-- Primary column -->
                        <section aria-labelledby="primary-heading"
                                 class="min-w-0 flex-1 h-full flex flex-col overflow-hidden lg:order-last">

                            <div class="px-4 py-6 flex items-center justify-between">
                                <div class="flex space-x-3">
                                    <h1 class="font-semibold text-xl">
                                        @if($isEditing)
                                            Edit Course
                                        @else
                                            Create Course
                                        @endif
                                    </h1>

                                    @if($isEditing)
                                        <x-badge :color="$course->state->color()">
                                            {{$course->state}}
                                        </x-badge>
                                    @endif
                                </div>

                                @if($isEditing)
                                    <div class="flex space-x-3">
                                        @can('delete courses')
                                            <form method="POST" action="{{route('courses.delete', $course)}}">
                                                @csrf
                                                <x-button type="error" icon="delete">
                                                    Delete
                                                </x-button>
                                            </form>
                                        @endcan

                                        @if(request()->user()->can('publish courses') && !$course->published_at)
                                            <form method="POST" action="{{route('courses.publish', $course)}}">
                                                @csrf
                                                <x-button icon="lightning-bolt">
                                                    Publish
                                                </x-button>
                                            </form>
                                        @endif
                                    </div>
                                @endif
                            </div>


                            <form method="POST"
                                  action="{{$isEditing ? route('courses.update', $course) : route('courses.store')}}">
                                @csrf

                                @if($errors->any())
                                    <div class="px-4 mb-6">
                                        <x-form-errors :errors="$errors"/>
                                    </div>
                                @endif

                                <div class="flex flex-col px-4 mb-6">
                                    <x-input name="name" label="Name" placeholder="Course name" :value="$course->name"
                                             wrapperClass="mb-4"/>

                                    <x-select name="category" label="Category" :value="$course->category"
                                              :options="$categories"
                                              wrapperClass="mb-4"/>

                                    <x-select name="difficulty" label="Difficulty" :value="$course->difficulty"
                                              :options="$difficulties"
                                              wrapperClass="mb-4"/>

                                    @trix($course, 'content')

                                    <div class="text-right mt-6">
                                        <x-button icon="check">
                                            Save
                                        </x-button>
                                    </div>
                                </div>
                            </form>
                        </section>
                    </main>

                    <!-- Secondary column (hidden on smaller screens) -->
                    @if($isEditing)
                        <aside class="hidden w-96 bg-white border-l border-gray-200 overflow-y-auto lg:block">
                            <ul class="divide-y divide-gray-200 border-b border-gray-200">
                                <li class="relative bg-white py-5 px-4 select-none">
                                    <div class="flex justify-between space-x-3">
                                        <div class="min-w-0 flex-1">
                                            <h3 class="px-3 text-xs font-semibold text-gray-500 uppercase tracking-wider flex items-center justify-between space-x-3"
                                                id="projects-headline">
                                                Assignments
                                                <a href="{{route('assignments.create', $course)}}"
                                                   class="inline-flex items-center p-1.5 border border-transparent rounded-md shadow-sm text-white bg-green-500 hover:bg-green-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-400">
                                                    <x-hero-icon type="plus" class="h-3 w-3"/>
                                                    Add Assignment
                                                </a>
                                            </h3>
                                        </div>
                                    </div>
                                </li>

                                @forelse($assignments as $assignment)
                                    <li class="relative py-2 px-4 bg-gray-50">
                                        <a href="{{route('assignments.edit', compact('course', 'assignment'))}}"
                                           class="group flex items-center px-3 py-2 text-sm font-medium text-gray-600 rounded-md hover:text-gray-900 hover:bg-gray-50">
                                            <span class="truncate">
                                                {{$assignment->order}}.
                                                {{$assignment->name}}
                                            </span>
                                        </a>
                                    </li>
                                @empty
                                    <li>
                                        <x-empty-state>
                                            <x-slot name="title">No assignments yet</x-slot>
                                            <x-slot name="message">Create an assignment to get started</x-slot>
                                            <x-slot name="button">
                                                <x-button as="a" :href="route('assignments.create', $course)"
                                                          icon="plus">
                                                    New Assignment
                                                </x-button>
                                            </x-slot>
                                        </x-empty-state>
                                    </li>
                                @endforelse
                            </ul>
                        </aside>
                    @endif
                </div>


            </div>
        </div>
    </div>
</x-app-layout>
