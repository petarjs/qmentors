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
                            @if($isEditing)
                                <div class="px-4 py-6 flex items-center justify-between">
                                    <div class="flex space-x-3">
                                        <h1 class="font-semibold text-xl">Edit Course</h1>

                                        <x-badge :color="$course->state->color()">
                                            {{$course->state}}
                                        </x-badge>
                                    </div>

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
                                </div>
                            @endif

                            <form method="POST"
                                  action="{{$isEditing ? route('courses.update', $course) : route('courses.store')}}">
                                @csrf

                                <div class="flex flex-col px-4 mb-6">
                                    <x-input name="name" label="Name" placeholder="Course name" :value="$course->name"
                                             wrapperClass="mb-4"/>

                                    <x-select name="category" label="Category" :value="$course->category"
                                              wrapperClass="mb-4">
                                        @foreach($categories as $category)
                                            <option @if($category == $course->category) selected
                                                    @endif value="{{$category}}">{{$category}}</option>
                                        @endforeach
                                    </x-select>

                                    <x-select name="difficulty" label="Difficulty" :value="$course->difficulty"
                                              wrapperClass="mb-4">
                                        @foreach($difficulties as $difficulty)
                                            <option @if($difficulty == $course->difficulty) selected
                                                    @endif value="{{$difficulty}}">{{$difficulty}}</option>
                                        @endforeach
                                    </x-select>

                                    <div class="text-right">
                                        <x-button icon="check">
                                            Save
                                        </x-button>
                                    </div>
                                </div>
                            </form>
                        </section>
                    </main>

                    <!-- Secondary column (hidden on smaller screens) -->
                    <aside class="hidden w-96 bg-white border-l border-gray-200 overflow-y-auto lg:block">
                        <ul class="divide-y divide-gray-200">
                            <li class="relative bg-white py-5 px-4 hover:bg-gray-50">
                                <div class="flex justify-between space-x-3">
                                    <x-hero-icon type="check" class="w-10 h-10"/>
                                    <div class="min-w-0 flex-1">
                                        <a href="#" class="block focus:outline-none">
                                            <span class="absolute inset-0" aria-hidden="true"></span>
                                            <p class="text-sm font-medium text-gray-900 truncate">
                                                Course Details
                                            </p>
                                            <p class="text-sm text-gray-500 truncate">Manage course details</p>
                                        </a>
                                    </div>
                                </div>
                            </li>

                            <li class="relative py-5 px-4 bg-gray-50">
                                <h3 class="px-3 text-xs font-semibold text-gray-500 uppercase tracking-wider flex items-center justify-between space-x-3"
                                    id="projects-headline">
                                    Assignments
                                    <button type="button"
                                            class="inline-flex items-center p-1.5 border border-transparent rounded-md shadow-sm text-white bg-green-500 hover:bg-green-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-400">
                                        <x-hero-icon type="plus" class="h-3 w-3"/>
                                        Add Assignment
                                    </button>
                                </h3>
                                <div class="mt-1 space-y-1" aria-labelledby="projects-headline">
                                    <a href="#"
                                       class="group flex items-center px-3 py-2 text-sm font-medium text-gray-600 rounded-md hover:text-gray-900 hover:bg-gray-50">
        <span class="truncate">
          1. Website redesign
        </span>
                                    </a>

                                    <a href="#"
                                       class="group flex items-center px-3 py-2 text-sm font-medium text-gray-600 rounded-md hover:text-gray-900 hover:bg-gray-50">
        <span class="truncate">
          2. GraphQL API
        </span>
                                    </a>

                                    <a href="#"
                                       class="group flex items-center px-3 py-2 text-sm font-medium text-gray-600 rounded-md hover:text-gray-900 hover:bg-gray-50">
        <span class="truncate">
          3. Customer migration guides
        </span>
                                    </a>

                                    <a href="#"
                                       class="group flex items-center px-3 py-2 text-sm font-medium text-gray-600 rounded-md hover:text-gray-900 hover:bg-gray-50">
        <span class="truncate">
          4. Profit sharing program
        </span>
                                    </a>
                                </div>
                            </li>
                        </ul>
                    </aside>
                </div>


            </div>
        </div>
    </div>
</x-app-layout>
