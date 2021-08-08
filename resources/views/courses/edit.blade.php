<x-app-layout>

<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Courses') }}
    </h2>
</x-slot>

<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
            @if($isEditing)
                @if(request()->user()->can('publish posts') && !$course->published_at)
                    <form method="POST" action="{{route('courses.publish', $course)}}">
                        @csrf
                        <button>Publish</button>
                    </form>
                @endif

                @can('delete courses')
                    <form method="POST" action="{{route('courses.delete', $course)}}">
                        @csrf
                        <button class="bg-red-600">Delete</button>
                    </form>
                @endcan
            @endif

            <form method="POST" action="{{$isEditing ? route('courses.update', $course) : route('courses.store')}}">
                @csrf

                <input name="name" type="text" value="{{$course->name}}">

                <button>Save</button>
            </form>

        </div>
    </div>
</div>
</x-app-layout>
