@props([
'name',
'label',
'placeholder' => '',
'wrapperClass' => '',
])

<div class="{{$wrapperClass}}">
    <label for="{{$name}}-select" class="block text-sm font-medium text-gray-700">{{$label}}</label>
    <select id="{{$name}}-select" name="{{$name}}" placeholder="{{$placeholder}}"
            {{$attributes}} class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-green-400 focus:border-green-400 sm:text-sm rounded-md">
        {{$slot}}
    </select>
</div>
