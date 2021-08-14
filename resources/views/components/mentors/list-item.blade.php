@props(['mentor'])

<tr>
    <td class="px-6 py-4 whitespace-nowrap">
        <div class="flex items-center">
            <div class="flex-shrink-0 h-10 w-10">
                <img class="h-10 w-10 rounded-full"
                     src="{{ $mentor->profile_photo_url }}"
                     alt="{{$mentor->name}}}}">
            </div>
            <div class="ml-4">
                <div class="text-sm font-medium text-gray-900">
                    {{$mentor->name}}
                </div>
                <div class="text-sm text-gray-500">
                    {{$mentor->email}}
                </div>
            </div>
        </div>
    </td>

    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
        {{$mentor->getRoleNames()->join(', ')}}
    </td>
    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
        <a href="{{route('mentors.edit', $mentor)}}" class="text-indigo-600 hover:text-indigo-900"> Edit</a>
    </td>
</tr>
