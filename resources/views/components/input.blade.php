@props([
'name',
'label',
'type' => 'text',
'placeholder' => '',
'wrapperClass' => '',
])

<div class="{{$wrapperClass}}">
    <label for="{{$name}}-input" class="block text-sm font-medium text-gray-700">{{$label}}</label>
    <div class="mt-1">
        <input type="{{$type}}" name="{{$name}}" id="{{$name}}-input"
               class="shadow-sm focus:ring-green-400 focus:border-green-400 block w-full sm:text-sm border-gray-300 rounded-md"
               placeholder="{{$placeholder}}" {{$attributes}}>
    </div>
</div>
