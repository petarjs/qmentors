@props([
'name',
'label',
'value',
'type' => 'text',
'placeholder' => '',
'readonly'=> false,
'wrapperClass' => '',
])

<div class="{{$wrapperClass}}">
    <label for="{{$name}}-input" class="block text-sm font-medium text-gray-700">{{$label}}</label>
    <div class="mt-1">
        <input type="{{$type}}" name="{{$name}}" id="{{$name}}-input"
               @if($readonly) readonly @endif
               value="{{old() ? old($name) : $value}}"
               class=" shadow-sm focus:ring-green-400 focus:border-green-400 block w-full sm:text-sm border-gray-300
               rounded-md"
               placeholder="{{$placeholder}}" {{$attributes}}>
    </div>
</div>
