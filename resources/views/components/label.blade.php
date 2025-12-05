@props(['value'])

<label {{ $attributes->merge(['class' => 'block font-orbitron font-medium text-sm text-gray-300 mb-2 tracking-wide']) }}>
    {{ $value ?? $slot }}
</label>