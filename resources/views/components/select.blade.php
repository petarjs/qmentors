@props([
'name',
'value',
'label',
'placeholder' => '',
'wrapperClass' => '',
'options' => [],
'optionKey' => 'id',
'optionLabel' => 'name',
])

<div class="{{$wrapperClass}}">
    <label for="{{$name}}-select" class="block text-sm font-medium text-gray-700">{{$label}}</label>
    <select
        id="{{$name}}-select"
        name="{{$name}}"
        placeholder="{{$placeholder}}"
        value="{{old() ? old($name) : $value}}"
        class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-green-400 focus:border-green-400 sm:text-sm rounded-md"
        {{$attributes}}
    >
        <option disabled selected hidden>{{empty($placeholder) ? "Select $label" : $placeholder}}</option>
        @foreach($options as $option)
            <option
                @if($option->{$optionKey} == $value || $option->{$optionKey} == old($name))
                selected
                @endif
                value="{{$option->$optionKey}}"
            >
                {{$option->$optionLabel}}
            </option>
        @endforeach
    </select>
</div>
