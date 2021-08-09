@props(['color'])

<span class="inline-flex items-center px-3 py-0.5 rounded-full text-sm font-medium select-none
@switch($color)

@case('gray')
    bg-gray-100 text-gray-800
    @break
@case('red')
    bg-red-100 text-red-800
    @break
@case('yellow')
    bg-yellow-100 text-yellow-800
    @break
@case('green')
    bg-green-100 text-green-800
    @break
@case('blue')
    bg-blue-100 text-blue-800
    @break
@case('indigo')
    bg-indigo-100 text-indigo-800
    @break
@case('purple')
    bg-purple-100 text-purple-800
    @break
@case('pink')
    bg-pink-100 text-pink-800
    @break

@default
    bg-gray-100 text-gray-800

@endswitch
    ">
  {{$slot}}
</span>
