<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>{{ isset($title)  ? $title . ' | ' . $app_title : $app_title }}</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

  @vite('resources/css/app.css')
  <style>
    body {
      /* font-family: 'Nunito Sans', sans-serif; */
      font-family: "Inter", sans-serif;
      color: #3a3a3a
    }

    [x-cloak] {
      display: none !important;
    }
  </style>
  @stack('page-style')
</head>

<body class="h-screen flex bg-gray-100">

  {{-- Sidebar --}}
  @include('template.sidebar')

  <main class="grow relative overflow-y-auto transition-all duration-500" x-data="" x-cloak :class="{'translate-x-14': $store.sidebar_mobile.isOpened}">
    <div class="absolute right-0 top-0 left-0 bottom-0  w-full h-full z-[100] bg-black/40" x-data="" x-show="$store.sidebar_mobile.isOpened"  x-transition.opacity></div>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
      integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    {{-- Navbar --}}
    @include('template.navbar')

    {{-- Main Content --}}
    <div class="mx-3 my-6 md:m-6">
      @yield('content')
    </div>

    {{-- Scripts --}}
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.14.0/dist/cdn.min.js"></script>
    @vite('resources/js/app.js')
    {{-- Custom Script from Child Views --}}
    @stack('page-script')

    <script>
      document.addEventListener('alpine:init', () => {
        Alpine.store('sidebar', {
          isCollapsed: false,

          init() {
            var valfromls = localStorage.getItem("sidebar_collapsed")
            this.isCollapsed = (localStorage.getItem("sidebar_collapsed") == 'true') || false;
            console.log(this.isCollapsed)
          },

          toggle() {
            var oldValue = this.isCollapsed
            this.isCollapsed = !oldValue
            // console.log(this.isCollapsed)
            localStorage.setItem("sidebar_collapsed", !oldValue)
          }
        });

        Alpine.store('sidebar_mobile', {
          isOpened : false,

          toggle() {
            this.isOpened = !this.isOpened
          }
        });



      })
    </script>

    @if (session()->has('toast-success'))
    <script type="module">
      Toastify({
        text: "{!! session()->get('toast-success') !!}",
        duration: 10000,
        escapeMarkup: false,
        newWindow: true,
        close: true,
        gravity: "top", // `top` or `bottom`
        position: "right", // `left`, `center` or `right`
        stopOnFocus: true, // Prevents dismissing of toast on hover
        className: 'toast-success',
        onClick: function(){} // Callback after click
      }).showToast();
    </script>
    @endif

    @if (session()->has('toast-error'))
    <script type="module">
      Toastify({
        text: "{!! session()->get('toast-error') !!}",
        duration: 10000,
        escapeMarkup: false,
        newWindow: true,
        close: true,
        gravity: "top", // `top` or `bottom`
        position: "right", // `left`, `center` or `right`
        stopOnFocus: true, // Prevents dismissing of toast on hover
        className: 'toast-error',
        onClick: function(){} // Callback after click
      }).showToast();
    </script>
    @endif

</body>

</html>
