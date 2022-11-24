@props(['name', 'label' => '', 'value' => null])

<div class="mb-3">

    @if($label)
        <label for="{{$name}}Input" class="form-label">{{ $label }}</label>
    @endif

    <textarea name="{{ $name }}" id="{{ $name }}Input" {{ $attributes->merge(['class' => 'form-control']) }}>
        {{ $value }}
    </textarea >

    @error($name)
        <div class="text-danger">{{ $message }}</div>
    @enderror
</div>