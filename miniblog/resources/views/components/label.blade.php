@props(['value'])

<label class="form-label" {{ $attributes }}>
    {{ $value ?? $slot }}
</label>
