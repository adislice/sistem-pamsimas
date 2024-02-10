@props([
    'size' => 'md',
    'square' => false,
])

@php
  switch ($size) {
      case 'sm':
          $fs = 'text-xs';
          $padding = 'px-3 py-1.5';
          break;
      case 'md':
      default:
          $fs = 'text-sm';
          $padding = 'px-5 py-2.5';
          break;
  }

  if ($square) {
      switch ($size) {
          case 'sm':
              $fs = 'text-xs';
              $padding = 'p-2';
              break;
          case 'md':
          default:
              $fs = 'text-sm';
              $padding = 'p-5';
              break;
      }
  }
@endphp
<button
  {{ $attributes->merge(['class' => "flex border hover:text-white items-center justify-center bg-transparent focus:shadow-lg transition-all duration-300 font-medium rounded-lg $fs $padding dark:bg-primary-600 dark:hover:bg-primary-700 focus:outline-none"]) }}>
  {{ $slot }}
</button>
