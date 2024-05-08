<aside
  class="h-full bg-slate-800 text-white shadow-lg shrink-0 overflow-y-auto transition-all duration-500 overflow-x-hidden sidebar fixed z-[9999] md:static  md:translate-x-0"
  x-data=""
  :class="{ 'expanded': !$store.sidebar.isCollapsed, '-translate-x-full': !$store.sidebar_mobile.isOpened }"
  x-transition x-cloak>
  <div class="w-full flex items-center sjustify-center h-14 px-2 overflow-x-hidden">
    
    <button class="flex md:hidden hover:bg-slate-700 shrink-0 size-12 items-center justify-center rounded-lg"
      x-data="" @click="$store.sidebar_mobile.toggle()">
      <x-feathericon-menu class="h-5 w-5" />
    </button>

    <h2 class="font-bold shrink-0 text-center md:mx-auto" x-show="!$store.sidebar.isCollapsed" x-transition>PAMSIMAS Tirta Amerta</h2>
  </div>
  <ul class="my-2 mx-2 flex flex-col gap-y-1">
    <li>
      <a href="/"
        class="flex items-center h-12 hover:bg-slate-700 rounded-lg {{ Request::is('/') ? 'nav-active' : '' }}">
        <div class="h-12 w-12 grid place-items-center shrink-0">
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 -960 960 960" class="size-6" fill="currentcolor"><path d="M240-200h120v-200q0-17 11.5-28.5T400-440h160q17 0 28.5 11.5T600-400v200h120v-360L480-740 240-560v360Zm-80 0v-360q0-19 8.5-36t23.5-28l240-180q21-16 48-16t48 16l240 180q15 11 23.5 28t8.5 36v360q0 33-23.5 56.5T720-120H560q-17 0-28.5-11.5T520-160v-200h-80v200q0 17-11.5 28.5T400-120H240q-33 0-56.5-23.5T160-200Zm320-270Z"/></svg>
        </div>
        <span class="nav-title shrink-0" x-data="" x-show="!$store.sidebar.isCollapsed"
          x-transition>Dashboard</span>
      </a>
    </li>
    <li>
      <a href="{{ route('pelanggan.index') }}"
        class="flex items-center h-12 hover:bg-slate-700 rounded-lg {{ Request::is('pelanggan*') ? 'nav-active' : '' }}">
        <div class="h-12 w-12 grid place-items-center shrink-0">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 24 24" fill="none"
            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
            class="lucide lucide-users-round">
            <path d="M18 21a8 8 0 0 0-16 0" />
            <circle cx="10" cy="8" r="5" />
            <path d="M22 20c0-3.37-2-6.5-4-8a5 5 0 0 0-.45-8.3" />
          </svg>
        </div>
        <span class="nav-title shrink-0" x-data="" x-show="!$store.sidebar.isCollapsed" x-transition>Data
          Pelanggan</span>
      </a>
    </li>
    <li><a href="{{ route('pencatatan_meteran.index') }}"
        class="flex items-center h-12 hover:bg-slate-700 rounded-lg {{ Request::is('pencatatan-meteran*') ? 'nav-active' : '' }}">
        <div class="h-12 w-12 grid place-items-center shrink-0">

          <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 24 24" fill="currentColor">
            <path d="M5 7h2v10H5zm9 0h1v10h-1zm-4 0h3v10h-3zM8 7h1v10H8zm8 0h3v10h-3z"></path>
            <path
              d="M4 5h4V3H4c-1.103 0-2 .897-2 2v4h2V5zm0 16h4v-2H4v-4H2v4c0 1.103.897 2 2 2zM20 3h-4v2h4v4h2V5c0-1.103-.897-2-2-2zm0 16h-4v2h4c1.103 0 2-.897 2-2v-4h-2v4z">
            </path>
          </svg>
        </div>
        <span class="nav-title shrink-0" x-data="" x-show="!$store.sidebar.isCollapsed"
          x-transition>Pencatatan Meteran</span>
      </a>
    </li>
    <li><a href="{{ route('pemakaian_air.index') }}"
        class="flex items-center h-12 hover:bg-slate-700 rounded-lg {{ Request::is('pemakaian-air*') ? 'nav-active' : '' }}">
        <div class="h-12 w-12 grid place-items-center shrink-0">

          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 -960 960 960" class="size-6" fill="currentcolor"><path d="M480-80q-82 0-155-31.5t-127.5-86Q143-252 111.5-325T80-480q0-83 31.5-155.5t86-127Q252-817 325-848.5T480-880q83 0 155.5 31.5t127 86q54.5 54.5 86 127T880-480q0 82-31.5 155t-86 127.5q-54.5 54.5-127 86T480-80Zm0-240q60 0 117 17.5T704-252q46-46 71-104.5T800-480q0-134-93-227t-227-93q-134 0-227 93t-93 227q0 65 24.5 124T256-252q50-33 107-50.5T480-320Zm0 80q-41 0-80 10t-74 30q35 20 74 30t80 10q41 0 80-10t74-30q-35-20-74-30t-80-10ZM280-520q17 0 28.5-11.5T320-560q0-17-11.5-28.5T280-600q-17 0-28.5 11.5T240-560q0 17 11.5 28.5T280-520Zm120-120q17 0 28.5-11.5T440-680q0-17-11.5-28.5T400-720q-17 0-28.5 11.5T360-680q0 17 11.5 28.5T400-640Zm280 120q17 0 28.5-11.5T720-560q0-17-11.5-28.5T680-600q-17 0-28.5 11.5T640-560q0 17 11.5 28.5T680-520ZM480-400q33 0 56.5-23.5T560-480q0-13-4-25.5T544-528l54-136q7-16 .5-31.5T576-718q-15-7-30.5-.5T524-696l-54 136q-30 5-50 27.5T400-480q0 33 23.5 56.5T480-400Zm0 80Zm0-206Zm0 286Z"/></svg>
        </div>
        <span class="nav-title shrink-0" x-data="" x-show="!$store.sidebar.isCollapsed"
          x-transition>Pemakaian Air</span>
      </a>
    </li>
    <li>
      <a href="{{ route('tagihan.index') }}"
        class="flex items-center h-12 hover:bg-slate-700 rounded-lg {{ Request::is('tagihan*') ? 'nav-active' : '' }}">
        <div class="h-12 w-12 grid place-items-center shrink-0">

          <svg class="h-6 w-6" viewBox="0 0 24 24" fill="currentColor">
            <path d="M0,0h24v24H0V0z" fill="none" />
            <g>
              <path
                d="M19.5,3.5L18,2l-1.5,1.5L15,2l-1.5,1.5L12,2l-1.5,1.5L9,2L7.5,3.5L6,2v14H3v3c0,1.66,1.34,3,3,3h12c1.66,0,3-1.34,3-3V2 L19.5,3.5z M15,20H6c-0.55,0-1-0.45-1-1v-1h10V20z M19,19c0,0.55-0.45,1-1,1s-1-0.45-1-1v-3H8V5h11V19z" />
              <rect height="2" width="6" x="9" y="7" />
              <rect height="2" width="2" x="16" y="7" />
              <rect height="2" width="6" x="9" y="10" />
              <rect height="2" width="2" x="16" y="10" />
            </g>
          </svg>
        </div>
        <span class="nav-title shrink-0" x-data="" x-show="!$store.sidebar.isCollapsed"
          x-transition>Tagihan Pembayaran</span>
      </a>
    </li>

    <li>
      <a href="{{ route('pemasukan.index') }}"
        class="flex items-center h-12 hover:bg-slate-700 rounded-lg {{ Request::is('pemasukan*') ? 'nav-active' : '' }}">
        <div class="h-12 w-12 grid place-items-center shrink-0">
          <svg viewBox="0 -960 960 960" class="size-6" fill="currentColor"><path d="m480-240 160-160-56-56-64 64v-168h-80v168l-64-64-56 56 160 160ZM200-640v440h560v-440H200Zm0 520q-33 0-56.5-23.5T120-200v-499q0-14 4.5-27t13.5-24l50-61q11-14 27.5-21.5T250-840h460q18 0 34.5 7.5T772-811l50 61q9 11 13.5 24t4.5 27v499q0 33-23.5 56.5T760-120H200Zm16-600h528l-34-40H250l-34 40Zm264 300Z"/></svg>
        </div>
        <span class="nav-title shrink-0" x-data="" x-show="!$store.sidebar.isCollapsed"
          x-transition>Pemasukan</span>
      </a>
    </li>

    <li>
      <a href="{{ route('pengeluaran.index') }}"
        class="flex items-center h-12 hover:bg-slate-700 rounded-lg {{ Request::is('pengeluaran*') ? 'nav-active' : '' }}">
        <div class="h-12 w-12 grid place-items-center shrink-0">
          <svg xmlns="http://www.w3.org/2000/svg" class="size-6" viewBox="0 -960 960 960" fill="currentcolor"><path d="M480-560 320-400l56 56 64-64v168h80v-168l64 64 56-56-160-160Zm-280-80v440h560v-440H200Zm0 520q-33 0-56.5-23.5T120-200v-499q0-14 4.5-27t13.5-24l50-61q11-14 27.5-21.5T250-840h460q18 0 34.5 7.5T772-811l50 61q9 11 13.5 24t4.5 27v499q0 33-23.5 56.5T760-120H200Zm16-600h528l-34-40H250l-34 40Zm264 300Z"/></svg>
        </div>
        <span class="nav-title shrink-0" x-data="" x-show="!$store.sidebar.isCollapsed"
          x-transition>Pengeluaran</span>
      </a>
    </li>

  </ul>

</aside>

@push('page-script')
@endpush
