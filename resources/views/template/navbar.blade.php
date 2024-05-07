<nav class="bg-white z-50 h-14 px-2 flex items-center sticky top-0 shadow-sm border">
  <button class="hidden md:flex hover:bg-hover shrink-0 size-10 items-center justify-center rounded"
      x-data="" @click="$store.sidebar.toggle()">
      <x-feathericon-menu class="h-5 w-5" />
    </button>
    <button x-data="" @click="$store.sidebar_mobile.toggle()" class="p-3 md:hidden">
      <x-feathericon-menu class="h-5 w-5" />
    </button>
  @isset($back)
  <a href="{{ $back }}" class="p-2 hover:bg-hover flex gap-2 rounded me-2 focus:text-primary-500" title="Kembali">
    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
      <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5 3 12m0 0 7.5-7.5M3 12h18" />
    </svg>    
    
  </a>
  @endisset
  {{-- <input type="text" class="form-input h-9 w-72 border-transparent rounded-full hover:bg-gray-100" placeholder="Cari..."> --}}
  <div class="ms-auto flex flex-row gap-x-2 items-center">
    <div x-data="{ open: false }" class="inline-flex relative">
      <button @click="open = ! open"
        class="px-4 pe-10 py-2 h-10 flex items-center justify-center hover:bg-hover rounded">
        <span class="select-none absolute inset-y-0 right-0 flex items-center cursor-pointer pr-3">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
            stroke="currentColor" class="w-4 h-4">
            <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
          </svg>
        </span>
        <svg xmlns="http://www.w3.org/2000/svg" class="size-6 me-1" viewBox="0 0 24 24" fill="currentcolor"><g><rect fill="none" height="24" width="24"/></g><g><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 4c1.93 0 3.5 1.57 3.5 3.5S13.93 13 12 13s-3.5-1.57-3.5-3.5S10.07 6 12 6zm0 14c-2.03 0-4.43-.82-6.14-2.88C7.55 15.8 9.68 15 12 15s4.45.8 6.14 2.12C16.43 19.18 14.03 20 12 20z"/></g></svg>
        {{ auth()->user()->nama }}
      </button>
      <div x-cloak x-show="open" @click.away="open = false" x-transition
        class="w-48 absolute top-12 right-0 p-2 bg-white border border-gray-200 rounded-lg shadow">
        <a href="#" class="px-2 flex py-1 cursor-pointer hover:bg-gray-100 focus:bg-primary-100 rounded-lg">Profil</a>
        <a href="#" class="px-2 flex py-1 cursor-pointer hover:bg-gray-100 focus:bg-primary-100 rounded-lg">Pengaturan</a>
        <a href="{{ route('logout') }}" class="px-2 py-1 cursor-pointer hover:bg-gray-100 focus:bg-primary-100 rounded-lg flex">Keluar</a>
      </div>
      
    </div>
    
  </div>
</nav>