<{{$as}} class="inline-flex items-center px-4 py-2 border border-transparent shadow-sm text-sm font-medium
rounded-md text-white focus:outline-none focus:ring-2
focus:ring-offset-2
@switch($type)
    @case('primary')
    bg-green-500 hover:bg-green-600 focus:ring-green-400
    @break

    @case('secondary')
    bg-gray-500 hover:bg-gray-600 focus:ring-gray-400
    @break

    @case('error')
    bg-red-500 hover:bg-red-600 focus:ring-red-400
    @break

    @case('warning')
    bg-yellow-500 hover:bg-yellow-600 focus:ring-yellow-400
    @break

    @default
    bg-green-500 hover:bg-green-600 focus:ring-green-400
@endswitch

{{$class}}
" {{ $attributes }}>
@isset($icon)
    <x-hero-icon :type="$icon" class="-ml-1 mr-2 h-5 w-5"/>
@endisset
{{$slot}}
</{{$as}}>
