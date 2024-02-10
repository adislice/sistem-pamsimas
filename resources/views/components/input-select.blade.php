<select 
    {{ $attributes->merge(['class' => "form-select block w-full rounded-md border-gray-300 shadow-sm focus:ring focus:ring-gray-300 focus:ring-opacity-50" ]) }}
    {{ $attributes }}
    >
    {{ $slot }}
</select>