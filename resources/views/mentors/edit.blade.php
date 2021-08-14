<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Mentor') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="flex-1 flex items-stretch overflow-hidden">
                    <main class="flex-1 overflow-y-auto">
                        <section aria-labelledby="primary-heading"
                                 class="min-w-0 flex-1 h-full flex flex-col overflow-hidden lg:order-last">

                            <div class="px-4 py-6 flex items-center justify-between">
                                <div class="flex space-x-3">
                                    <h1 class="font-semibold text-xl">
                                        Mentor Details
                                    </h1>
                                </div>

                                @can('manage users')
                                    <div class="flex space-x-3">
                                        <form method="POST"
                                              action="{{route('mentors.delete', $mentor)}}">
                                            @csrf
                                            <x-button type="error" icon="delete">
                                                Delete
                                            </x-button>
                                        </form>
                                    </div>
                                @endcan
                            </div>

                            <form method="POST"
                                  action="{{ route('mentors.update', compact('mentor')) }}">
                                @csrf
                                @method('PUT')

                                <div class="flex flex-col px-4 mb-6">
                                    <x-input name="name" label="Name" placeholder="Mentor name"
                                             :value="$mentor->name"
                                             :readonly="!request()->user()->can('manage users')"
                                             wrapperClass="mb-4"/>

                                    <div class="text-right mt-6">
                                        <x-button icon="check">
                                            Save
                                        </x-button>
                                    </div>
                                </div>
                            </form>
                        </section>

                    </main>
                </div>
            </div>
        </div>
    </div>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 flex space-x-3">
            <div class="flex-1 bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="flex-1 flex items-stretch overflow-hidden">
                    <main class="flex-1 overflow-y-auto">
                        <section class="min-w-0 flex-1 h-full flex flex-col overflow-hidden">
                            <div class="px-4 py-6 flex items-center justify-between">
                                <div class="flex space-x-3">
                                    <h2 class="font-semibold text-xl">
                                        Courses
                                    </h2>
                                </div>
                            </div>

                            <section class="min-w-0 flex-1 flex flex-col overflow-hidden">
                                @can('assign courses to mentors')
                                    <form method="POST"
                                          action="{{ route('mentors.assign-course', compact('mentor')) }}">
                                        @csrf
                                        @method('POST')

                                        @if($errors->assignCourse->any())
                                            <div class="px-4 mb-6">
                                                <x-form-errors :errors="$errors->assignCourse"/>
                                            </div>
                                        @endif

                                        <div class="flex flex-col px-4 mb-6">
                                            <x-select name="course_id" label="Assign Course"
                                                      value=""
                                                      placeholder="Choose a course"
                                                      :options="$courses"
                                                      wrapperClass="mb-4"/>

                                            <div class="text-right mt-6">
                                                <x-button icon="check">
                                                    Add course
                                                </x-button>
                                            </div>
                                        </div>
                                    </form>
                                @endcan

                                <div class="bg-white shadow overflow-hidden sm:rounded-md">
                                    <div class="px-4 py-6 flex items-center justify-between">
                                        <div class="flex space-x-3">
                                            <h2 class="font-semibold text-xl">
                                                Assigned Courses
                                            </h2>
                                        </div>
                                    </div>

                                    <ul class="divide-y divide-gray-200">
                                        @foreach($assignedCourses as $course)
                                            <li>
                                                <x-courses.list-item :course="$course"/>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </section>
                        </section>
                    </main>
                </div>
            </div>

            <div class="flex-1 bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="flex-1 flex items-stretch overflow-hidden">
                    <section class="flex-1 overflow-y-auto">
                        <section class="min-w-0 flex-1 h-full flex flex-col overflow-hidden">
                            <div class="px-4 py-6 flex items-center justify-between">
                                <div class="flex space-x-3">
                                    <h1 class="font-semibold text-xl">
                                        Mentees
                                    </h1>
                                </div>
                            </div>
                        </section>
                    </section>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
