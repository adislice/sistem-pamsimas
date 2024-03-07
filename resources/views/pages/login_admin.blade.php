<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <title>Login | {{ $app_title }}</title>
  {{-- Our CSS --}}
  @vite('resources/css/app.css')

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
</head>

<body>
  <div class="flex h-screen w-full items-center justify-center bg-gray-50">
    <div class="bg-white shadow p-5 rounded-md w-full max-w-96 flex flex-col">
      <h1 class="font-medium text-2xl text-center mb-4">Login PAMSIMAS</h1>
      <form action="{{ route('login_process') }}" method="post">
        @csrf
        <div class="mb-3">
          <x-input-text-icon name="username" type="text" placeholder="Username" label="Username"
            icon-start="person" />
        </div>

        <div class="mb-3">
          <x-input-text-icon name="password" type="password" placeholder="Password" label="Password" icon-start="key" />
        </div>

        <x-button type="submit" class="w-full mt-4 rounded-lg">
          <span class="mdi-round me-2 text-xl">login</span> Login
        </x-button>
      </form>
      @if(session()->has('alert-error'))
      <div class="flex bg-red-100 rounded-lg p-3 text-sm mt-4 text-red-700" role="alert">
        <svg class="w-5 h-5 inline mr-2 shrink-0" fill="currentColor" viewBox="0 0 20 20"
          xmlns="http://www.w3.org/2000/svg">
          <path fill-rule="evenodd"
            d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
            clip-rule="evenodd"></path>
        </svg>
        <div>
          {!! session()->get('alert-error') !!}
        </div>
      </div>
      @endif
      
    </div>

  </div>

  {{-- Our JS --}}
  @vite('resources/js/app.js')

</body>

</html>
