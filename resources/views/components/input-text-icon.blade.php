<div {{ $attributes->only('class')->merge(['class' => '']) }}>
    <label for="{{ $name }}" class="block mb-1 text-sm font-medium">{{ $label }}</label>
    <div class="relative">
      <input id="{{ $name }}"
        class="bg-gray-50 border border-gray-300 text-sm focus:outline-none focus:border-primary-300 focus:ring focus:ring-primary-200 focus:ring-opacity-50 @isset($iconStart) ps-9 @endisset rounded-lg block w-full p-2.5  @error($name) border-red-500 @enderror"
        name={{ $name }} {{ $attributes->except(['class']) }} />
        @isset($iconStart)
        <div class="mdi-round absolute start-0 top-1/2 -translate-y-1/2 ms-2.5 text-gray-600 text-xl">
            {{ $iconStart}}
          </div>
        @endisset
      
    </div>
    <span class="text-red-500 text-sm">
      @error($name)
          {{ $message }}
      @enderror
    </span>
  </div>
  