@props(['name', 'type', 'label' => '', 'value' => ''])

<div class="mb-3">

    @if($label)
        <label for="{{$name}}Input" class="form-label">{{ $label }}</label>
    @endif

    <input 
        name="{{ $name }}" 
        type="{{ $type }}"  
        id="{{ $name }}Input"
        value="{{ $value }}"
        {{ $attributes->merge(['class' => 'form-control']) }},
    >

    @error($name)
        <div class="text-danger">{{ $message }}</div>
    @enderror

</div>