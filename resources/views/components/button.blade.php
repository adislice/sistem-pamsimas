@props([
    'size' => 'sm',
    'href' => '',
])

@php
  switch ($size) {
      case 'sm':
          $paddingClass = 'px-4 py-2';
          break;

      default:
          $paddingClass = 'px-5 py-2.5';
          break;
  }

  if ($href) {
      $isLink = true;
  } else {
      $isLink = false;
  }
@endphp

@if ($isLink)
  <a href={{ $href }}
   
    {{ $attributes->twMerge("text-white border border-transparent inline-flex items-center justify-center bg-primary-500 hover:bg-primary-700 focus:ring-2 focus:ring-gray-300 transition-all duration-100 font-medium text-sm $paddingClass focus:outline-none") }}
    >
    {{ $slot }}
  </a>
@else
  <button type={{ $type }}
    {{ $attributes->twMerge("text-white border border-transparent flex items-center justify-center bg-primary-500 hover:bg-primary-700 focus:ring-2 focus:ring-gray-300 transition-all duration-100 font-medium text-sm $paddingClass focus:outline-none") }}
    >
    {{ $slot }}
  </button>
@endif
