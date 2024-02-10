<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Catat Meteran</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

  @vite('resources/css/app.css')
</head>

<body class="flex min-h-screen flex-col">

  <div class="border-b shadow-sm relative p-2">
    <x-button href="{{ route('pencatatan_meteran.index') }}"
      class="!p-0 bg-transparent hover:bg-black/10 absolute top-1/2 -translate-y-1/2 left-2 text-primary-700 size-10 rounded">
      <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
        stroke="currentColor" class="size-6">
        <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5 3 12m0 0 7.5-7.5M3 12h18" />
      </svg>
    </x-button>
    <h1 class="text-xl font-bold text-center">Catat Meteran</h1>
    <p class="text-sm text-gray-600 text-center">Bulan : {{ request()->get('bulan') }} / Tahun :
      {{ request()->get('tahun') }}</p>
  </div>

  <div class="mx-auto flex flex-col grow h-full w-full max-w-96 px-2">
    <div class="rounded p-2">
      <p class="text-center text-gray-500">{{ $pelanggan->nama }}</p>
      <p class="text-center text-gray-500">{{ $pelanggan->no_pelanggan }}</p>
      @if ($is_sudah_dicatat)
          <div class="py-1 px-2 text-sm gap-1 border border-green-300 flex w-fit mx-auto bg-green-100 text-green-700 rounded">
            <svg class="size-5" viewBox="0 0 24 24" style="fill: currentColor;transform: ;msFilter:;"><path d="M19.965 8.521C19.988 8.347 20 8.173 20 8c0-2.379-2.143-4.288-4.521-3.965C14.786 2.802 13.466 2 12 2s-2.786.802-3.479 2.035C6.138 3.712 4 5.621 4 8c0 .173.012.347.035.521C2.802 9.215 2 10.535 2 12s.802 2.785 2.035 3.479A3.976 3.976 0 0 0 4 16c0 2.379 2.138 4.283 4.521 3.965C9.214 21.198 10.534 22 12 22s2.786-.802 3.479-2.035C17.857 20.283 20 18.379 20 16c0-.173-.012-.347-.035-.521C21.198 14.785 22 13.465 22 12s-.802-2.785-2.035-3.479zm-9.01 7.895-3.667-3.714 1.424-1.404 2.257 2.286 4.327-4.294 1.408 1.42-5.749 5.706z"></path></svg>
            Sudah dicatat
          </div>
      @else 
      <div class="py-1 px-2 text-sm gap-1 border border-yellow-300 flex w-fit mx-auto bg-yellow-100 text-yellow-700 rounded">
        <svg class="size-5" viewBox="0 0 24 24" style="fill: currentColor;transform: ;msFilter:;"><path d="M12 2C6.486 2 2 6.486 2 12s4.486 10 10 10 10-4.486 10-10S17.514 2 12 2zm1 15h-2v-6h2v6zm0-8h-2V7h2v2z"></path></svg>
        Belum dicatat
      </div>
      @endif
    </div>
    @if (session()->has('alert-success'))
      <div class="flex my-2 bg-green-100 rounded-lg p-3 text-sm text-green-700" role="alert">
        <svg class="w-5 h-5 inline mr-2 shrink-0" fill="currentColor" viewBox="0 0 20 20"
          xmlns="http://www.w3.org/2000/svg">
          <path fill-rule="evenodd"
            d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
            clip-rule="evenodd"></path>
        </svg>
        <div>
          {!! session()->get('alert-success') !!}
        </div>
      </div>
    @endif
    @if (session()->has('alert-error'))
      <div class="flex my-2 bg-red-100 rounded-lg p-3 text-sm text-red-700" role="alert">
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
    <select id="deviceSelector"></select>

    <div class="relative">
      <video id="video" class="w-full aspect-square h-auto bg-gray-200 object-cover" autoplay></video>
      <img id="thumbnail" src="" alt="Captured Image Thumbnail"
        class="hidden absolute top-0 left-0 h-full bg-slate-300 w-full object-cover">
    </div>

    <x-button id="capture" class="rounded mt-1 bg-green-600 hover:bg-green-800 w-fit mx-auto">Ambil Gambar</x-button>

    <div class="w-full max-w-96 mx-auto py-4">
      <form action="{{ route('pencatatan_meteran.catat_action', $pelanggan->id) }}" method="post"
        @if($is_sudah_dicatat)
        onSubmit="return confirm('Meteran pelanggan {{ $pelanggan->no_pelanggan}} sudah dicatat sebelumnya. Apakah Anda yakin ingin memperbarui data meteran?') "
        @endif
        >
        @csrf
        <label for="angka_meteran" class="font-medium text-sm text-gray-700">Angka Meteran</label>
        <input type="number" min="0" step="1" id="angka_meteran" name="angka_meteran"
          class="form-input bg-gray-50 block w-full rounded-md border-gray-300 shadow-sm focus:border-primary-300 focus:ring focus:ring-primary-200 focus:ring-opacity-50"
          placeholder="Masukkan angka meteran" required value="{{ $is_sudah_dicatat ? $is_sudah_dicatat->angka_meteran : '' }}">
        <input type="hidden" name="foto" id="capturedImage">
        <input type="hidden" name="bulan" value="{{ request()->get('bulan') }}">
        <input type="hidden" name="tahun" value="{{ request()->get('tahun') }}">
        <x-button type="submit" class="rounded mt-3 w-full">Catat</x-button>
      </form>

    </div>
  </div>

  <div class="mt-2 flex w-full border-t flex-wrap">
    <div class="w-1/2 shrink-0 border-r">
      @if ($previous_pelanggan)
      <a class="p-5 flex flex-col items-start hover:bg-gray-100" href="{{ route('pencatatan_meteran.catat', $previous_pelanggan->id) . '?' . request()->getQueryString() }}">
      <div class="text-primary-600 font-bold">Sebelumnya</div>
      <div class="text-sm text-start text-gray-600">{{ $previous_pelanggan->nama }} - {{ $previous_pelanggan->no_pelanggan }}</div>
      </a>
      @endif
      
    </div>
    <div class="w-1/2 shrink-0">
      @if ($next_pelanggan)
      <a class="p-5 flex flex-col items-end hover:bg-gray-100" href="{{ route('pencatatan_meteran.catat', $next_pelanggan->id) . '?' . request()->getQueryString() }}">
      <div class="text-primary-600 font-bold">Selanjutnya</div>
      <div class="text-sm text-end text-gray-600">{{ $next_pelanggan->nama }} - {{ $next_pelanggan->no_pelanggan }}</div>
      </a>
      @endif
    </div>
  </div>

  @vite('resources/js/app.js')

  <script>
    const video = document.getElementById('video')
    const canvas = document.getElementById('canvas')
    const captureBtn = document.getElementById('capture');
    const deviceSelector = document.getElementById('deviceSelector');
    const capturedImageInput = document.getElementById('capturedImage')
    const thumbnail = document.getElementById('thumbnail');
    var previewing = false
    async function getCameraDevices() {
      const devices = await navigator.mediaDevices.enumerateDevices();
      const videoDevices = devices.filter(device => device.kind === 'videoinput');
      videoDevices.forEach(device => {
        const option = document.createElement('option');
        option.value = device.deviceId;
        option.text = device.label || `Camera ${deviceSelector.length + 1}`;
        deviceSelector.appendChild(option);
      });
    }

    async function startCamera(deviceId) {
      if (video.srcObject) {
        video.srcObject.getTracks().forEach(track => track.stop());
      }
      const stream = await navigator.mediaDevices.getUserMedia({
        video: {
          deviceId: deviceId ? {
            exact: deviceId
          } : undefined
        }
      });
      video.srcObject = stream;
    }

    captureBtn.addEventListener('click', () => {
      if (previewing) {
        thumbnail.style.display = 'none'
        captureBtn.innerText = "Ambil Gambar"
        previewing = false
      } else {
        const canvas = document.createElement('canvas');
        canvas.width = video.videoWidth;
        canvas.height = video.videoHeight;
        const context = canvas.getContext('2d');
        context.drawImage(video, 0, 0, canvas.width, canvas.height);
        const imageDataURL = canvas.toDataURL('image/png');
        capturedImageInput.value = imageDataURL;
        thumbnail.src = imageDataURL;
        thumbnail.style.display = 'block'
        captureBtn.innerText = 'Ambil ulang'
        previewing = true
      }

    });

    deviceSelector.addEventListener('change', (event) => {
      startCamera(event.target.value);
    });

    getCameraDevices().then(() => {
      if (deviceSelector.options.length > 0) {
        startCamera(deviceSelector.value);
      }
    });
  </script>
</body>

</html>
