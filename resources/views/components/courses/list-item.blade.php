@props(['course'])

<a href="{{route('courses.edit', $course)}}" class="block hover:bg-gray-50">
    <div class="px-4 py-4 flex items-center sm:px-6">
        <div class="min-w-0 flex-1 sm:flex sm:items-center sm:justify-between">
            <div class="truncate">
                <div class="flex text-sm items-center">
                    <p class="font-medium text-indigo-600 truncate">{{$course->name}}</p>
                    <p class="ml-1 flex-shrink-0 font-normal text-gray-500">
                        in {{$course->category}} ({{$course->difficulty}})
                    </p>
                    <div class="ml-2">
                        <x-badge :color="$course->state->color()">
                            {{$course->state}}
                        </x-badge>
                    </div>
                </div>
                <div class="mt-2 flex">
                    <div class="flex items-center text-sm text-gray-500">
                        <!-- Heroicon name: solid/calendar -->
                        <svg class="flex-shrink-0 mr-1.5 h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg"
                             viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                            <path fill-rule="evenodd"
                                  d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z"
                                  clip-rule="evenodd"/>
                        </svg>
                        <p>
                            @if($course->published_at)
                                Published at
                                <time datetime="2020-01-07">{{$course->published_at}}</time>
                            @else
                                Created at
                                <time datetime="2020-01-07">{{$course->created_at}}</time>
                            @endif

                        </p>
                    </div>
                </div>
            </div>
            <div class="mt-4 flex-shrink-0 sm:mt-0 sm:ml-5">
                <div class="flex overflow-hidden -space-x-1">
                    <img class="inline-block h-6 w-6 rounded-full ring-2 ring-white"
                         src="https://images.unsplash.com/photo-1506794778202-cad84cf45f1d?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
                         alt="Dries Vincent">

                    <img class="inline-block h-6 w-6 rounded-full ring-2 ring-white"
                         src="https://images.unsplash.com/photo-1517841905240-472988babdf9?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
                         alt="Lindsay Walton">

                    <img class="inline-block h-6 w-6 rounded-full ring-2 ring-white"
                         src="https://images.unsplash.com/photo-1438761681033-6461ffad8d80?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
                         alt="Courtney Henry">

                    <img class="inline-block h-6 w-6 rounded-full ring-2 ring-white"
                         src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
                         alt="Tom Cook">
                </div>
            </div>
        </div>
        <div class="ml-5 flex-shrink-0">
            <!-- Heroicon name: solid/chevron-right -->
            <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                 fill="currentColor" aria-hidden="true">
                <path fill-rule="evenodd"
                      d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                      clip-rule="evenodd"/>
            </svg>
        </div>
    </div>
</a>
