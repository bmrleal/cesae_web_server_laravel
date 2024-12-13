@props(['value'])

<label {{ $attributes->merge(['class' => 'block text-gray-700 text-xl font-bold mb-2"']) }}>
    {{ $value ?? $slot }}
</label>
