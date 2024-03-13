<aside class="h-full bg-slate-800 text-white shadow-lg shrink-0 overflow-y-auto transition-all duration-500 overflow-x-hidden sidebar fixed z-[9999] md:static  md:translate-x-0" x-data="" :class="{ 'expanded': !$store.sidebar.isCollapsed, '-translate-x-full': !$store.sidebar_mobile.isOpened }" x-transition x-cloak>
  <div class="w-full flex items-center sjustify-center h-14 px-2 overflow-x-hidden">
    <button class="hidden md:flex hover:bg-slate-700 shrink-0 size-12 items-center justify-center rounded-lg" x-data="" @click="$store.sidebar.toggle()" >
      <x-feathericon-menu class="h-5 w-5" />
    </button>
    <button class="flex md:hidden hover:bg-slate-700 shrink-0 size-12 items-center justify-center rounded-lg" x-data="" @click="$store.sidebar_mobile.toggle()" >
      <x-feathericon-menu class="h-5 w-5" />
    </button>

    <div class="font-bold shrink-0" x-show="!$store.sidebar.isCollapsed" x-transition>PAMSIMAS Tirta Amerta</div>
  </div>
  <ul class="my-2 mx-2 flex flex-col gap-y-2">
    <li>
      <a href="/" class="flex items-center h-12 hover:bg-slate-700 rounded-lg {{ Request::is('/') ? 'nav-active' : '' }}" >
        <div class="h-12 w-12 grid place-items-center shrink-0">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 24 24" fill="none"
          stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
          class="lucide lucide-home">
          <path d="m3 9 9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z" />
          <polyline points="9 22 9 12 15 12 15 22" />
        </svg>
        </div>
        <span class="nav-title shrink-0" x-data="" x-show="!$store.sidebar.isCollapsed" x-transition>Dashboard</span>
      </a>
    </li>
    <li>
      <a href="{{ route('pelanggan.index') }}" class="flex items-center h-12 hover:bg-slate-700 rounded-lg {{ Request::is('pelanggan*') ? 'nav-active' : '' }}"  >
        <div class="h-12 w-12 grid place-items-center shrink-0">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 24 24" fill="none"
          stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
          class="lucide lucide-users-round">
          <path d="M18 21a8 8 0 0 0-16 0" />
          <circle cx="10" cy="8" r="5" />
          <path d="M22 20c0-3.37-2-6.5-4-8a5 5 0 0 0-.45-8.3" />
        </svg>
      </div>
        <span class="nav-title shrink-0" x-data="" x-show="!$store.sidebar.isCollapsed" x-transition>Data Pelanggan</span>
      </a>
    </li>
    <li><a href="{{ route('pencatatan_meteran.index') }}" class="flex items-center h-12 hover:bg-slate-700 rounded-lg {{ Request::is('pencatatan-meteran*') ? 'nav-active' : '' }}" >
      <div class="h-12 w-12 grid place-items-center shrink-0">

        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 24 24" fill="currentColor"><path d="M5 7h2v10H5zm9 0h1v10h-1zm-4 0h3v10h-3zM8 7h1v10H8zm8 0h3v10h-3z"></path><path d="M4 5h4V3H4c-1.103 0-2 .897-2 2v4h2V5zm0 16h4v-2H4v-4H2v4c0 1.103.897 2 2 2zM20 3h-4v2h4v4h2V5c0-1.103-.897-2-2-2zm0 16h-4v2h4c1.103 0 2-.897 2-2v-4h-2v4z"></path></svg>
      </div>
        <span class="nav-title shrink-0" x-data="" x-show="!$store.sidebar.isCollapsed" x-transition>Pencatatan Meteran</span>
      </a>
    </li>
    <li><a href="{{ route('pemakaian_air.index') }}" class="flex items-center h-12 hover:bg-slate-700 rounded-lg {{ Request::is('pemakaian-air*') ? 'nav-active' : '' }}" >
      <div class="h-12 w-12 grid place-items-center shrink-0">

        <x-feathericon-pie-chart class="h-5 w-5" />
      </div>
        <span class="nav-title shrink-0" x-data="" x-show="!$store.sidebar.isCollapsed" x-transition>Pemakaian Air</span>
      </a>
    </li>
    <li><a href="{{ route('tagihan.index') }}" class="flex items-center h-12 hover:bg-slate-700 rounded-lg {{ Request::is('tagihan*') ? 'nav-active' : '' }}" >
      <div class="h-12 w-12 grid place-items-center shrink-0">

        <svg class="h-6 w-6" viewBox="0 0 24 24" fill="currentColor"><path d="M0,0h24v24H0V0z" fill="none"/><g><path d="M19.5,3.5L18,2l-1.5,1.5L15,2l-1.5,1.5L12,2l-1.5,1.5L9,2L7.5,3.5L6,2v14H3v3c0,1.66,1.34,3,3,3h12c1.66,0,3-1.34,3-3V2 L19.5,3.5z M15,20H6c-0.55,0-1-0.45-1-1v-1h10V20z M19,19c0,0.55-0.45,1-1,1s-1-0.45-1-1v-3H8V5h11V19z"/><rect height="2" width="6" x="9" y="7"/><rect height="2" width="2" x="16" y="7"/><rect height="2" width="6" x="9" y="10"/><rect height="2" width="2" x="16" y="10"/></g></svg>
      </div>
        <span class="nav-title shrink-0" x-data="" x-show="!$store.sidebar.isCollapsed" x-transition>Tagihan Pembayaran</span>
      </a>
    </li>



  </ul>

</aside>

@push('page-script')

@endpush
