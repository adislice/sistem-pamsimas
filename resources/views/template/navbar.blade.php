<nav class="bg-white z-50 h-14 px-2 flex items-center sticky top-0 shadow-sm border">
  <button class="hidden md:flex hover:bg-hover shrink-0 size-10 items-center justify-center rounded-lg"
      x-data="" @click="$store.sidebar.toggle()">
      <x-feathericon-menu class="h-5 w-5" />
    </button>
    <button x-data="" @click="$store.sidebar_mobile.toggle()" class="p-3 md:hidden">
      <x-feathericon-menu class="h-5 w-5" />
    </button>
  @isset($back)
  <a href="{{ $back }}" class="p-2 hover:bg-gray-100 flex gap-2 rounded me-2 focus:text-blue-500" title="Kembali">
    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
      <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5 3 12m0 0 7.5-7.5M3 12h18" />
    </svg>    
    
  </a>
  @endisset
  {{-- <input type="text" class="form-input h-9 w-72 border-transparent rounded-full hover:bg-gray-100" placeholder="Cari..."> --}}
  <div class="ms-auto flex flex-row gap-x-2 items-center">
    <div class="inline-flex relative">
      <button
        class="h-10 w-10 flex items-center justify-center hover:bg-gray-100 border border-gray-200 rounded-full">
        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24" fill="none"
          stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
          class="lucide lucide-bell">
          <path d="M6 8a6 6 0 0 1 12 0c0 7 3 9 3 9H3s3-2 3-9" />
          <path d="M10.3 21a1.94 1.94 0 0 0 3.4 0" />
        </svg>
      </button>
    </div>
    <div x-data="{ open: false }" class="inline-flex relative">
      <button @click="open = ! open"
        class="px-4 pe-10 py-2 h-10 flex items-center justify-center hover:bg-hover rounded">
        <span class="select-none absolute inset-y-0 right-0 flex items-center cursor-pointer pr-3">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
            stroke="currentColor" class="w-4 h-4">
            <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
          </svg>
        </span>
        {{ auth()->user()->nama }}
      </button>
      <div x-cloak x-show="open" @click.away="open = false" x-transition
        class="w-48 absolute top-12 right-0 p-2 bg-white border border-gray-200 rounded-lg shadow">
        <div class="px-2 py-1 cursor-pointer hover:bg-sky-100 rounded-lg">First Menu</div>
        <div class="px-2 py-1 cursor-pointer hover:bg-sky-100 rounded-lg">Second Menu</div>
        <a href="{{ route('logout') }}" class="px-2 py-1 cursor-pointer hover:bg-sky-100 rounded-lg">Keluar</a>
      </div>
      
    </div>
    
  </div>
</nav>