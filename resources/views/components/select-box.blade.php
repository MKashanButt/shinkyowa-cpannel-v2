<select
    {{ $attributes->merge(['class' => 'rounded-md text-xs uppercase border-gray-300 focus:border-blue-900 focus:ring-blue-900 shadow-sm']) }}>
    {{ $slot }}
</select>
