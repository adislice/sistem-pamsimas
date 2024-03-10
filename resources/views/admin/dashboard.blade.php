<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link
    href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&family=Nunito+Sans:ital,opsz,wght@0,6..12,200..1000;1,6..12,200..1000&family=Public+Sans:ital,wght@0,100..900;1,100..900&display=swap"
    rel="stylesheet">

  @vite('resources/css/app.css')
  <style>
    body {
      font-family: 'Nunito Sans', sans-serif;
      color: #3a3a3a
    }

    [x-cloak] {
      display: none !important;
    }
  </style>
</head>

<body class="h-screen flex bg-blue-50">

  <aside class="h-full bg-white w-72 shadow-lg shrink-0 overflow-y-auto">
    <div class="w-full flex items-center justify-center p-5">
      <div class="rounded-full bg-sky-100 p-4">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-sky-500" viewBox="0 0 24 24" fill="none"
          stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
          class="lucide lucide-landmark">
          <line x1="3" x2="21" y1="22" y2="22" />
          <line x1="6" x2="6" y1="18" y2="11" />
          <line x1="10" x2="10" y1="18" y2="11" />
          <line x1="14" x2="14" y1="18" y2="11" />
          <line x1="18" x2="18" y1="18" y2="11" />
          <polygon points="12 2 20 7 4 7" />
        </svg>
      </div>
    </div>
    <ul class="my-2 mx-2 flex flex-col gap-y-2">
      <li>
        <a href="#" class="flex items-start py-3 px-4 bg-blue-100/60 text-blue-500 font-semibold rounded-lg">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 me-2" viewBox="0 0 24 24" fill="none"
            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
            class="lucide lucide-home">
            <path d="m3 9 9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z" />
            <polyline points="9 22 9 12 15 12 15 22" />
          </svg>
          Dashboard
        </a>
      </li>
      <li>
        <a href="#" class="flex items-start py-3 px-4 hover:bg-gray-100 rounded-lg">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 me-2" viewBox="0 0 24 24" fill="none"
            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
            class="lucide lucide-users-round">
            <path d="M18 21a8 8 0 0 0-16 0" />
            <circle cx="10" cy="8" r="5" />
            <path d="M22 20c0-3.37-2-6.5-4-8a5 5 0 0 0-.45-8.3" />
          </svg>
          Data Pelanggan
        </a>
      </li>
      <li><a href="#" class="flex items-start py-3 px-4 hover:bg-gray-100 rounded-lg">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 me-2" viewBox="0 0 24 24" fill="none"
            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
            class="lucide lucide-layers-2">
            <path d="m16.02 12 5.48 3.13a1 1 0 0 1 0 1.74L13 21.74a2 2 0 0 1-2 0l-8.5-4.87a1 1 0 0 1 0-1.74L7.98 12" />
            <path
              d="M13 13.74a2 2 0 0 1-2 0L2.5 8.87a1 1 0 0 1 0-1.74L11 2.26a2 2 0 0 1 2 0l8.5 4.87a1 1 0 0 1 0 1.74Z" />
          </svg>
          Meteran Penggunaan Air
        </a>
      </li>
      <li><a href="#" class="flex items-start py-3 px-4 hover:bg-gray-100 rounded-lg">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 me-2" viewBox="0 0 24 24" fill="none"
            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
            class="lucide lucide-layers-2">
            <path d="m16.02 12 5.48 3.13a1 1 0 0 1 0 1.74L13 21.74a2 2 0 0 1-2 0l-8.5-4.87a1 1 0 0 1 0-1.74L7.98 12" />
            <path
              d="M13 13.74a2 2 0 0 1-2 0L2.5 8.87a1 1 0 0 1 0-1.74L11 2.26a2 2 0 0 1 2 0l8.5 4.87a1 1 0 0 1 0 1.74Z" />
          </svg>
          Tagihan Pembayaran
        </a>
      </li>
      <li><a href="#" class="flex items-start py-3 px-4 hover:bg-gray-100 rounded-lg">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 me-2" viewBox="0 0 24 24" fill="none"
            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
            class="lucide lucide-layers-2">
            <path d="m16.02 12 5.48 3.13a1 1 0 0 1 0 1.74L13 21.74a2 2 0 0 1-2 0l-8.5-4.87a1 1 0 0 1 0-1.74L7.98 12" />
            <path
              d="M13 13.74a2 2 0 0 1-2 0L2.5 8.87a1 1 0 0 1 0-1.74L11 2.26a2 2 0 0 1 2 0l8.5 4.87a1 1 0 0 1 0 1.74Z" />
          </svg>
          Laporan
        </a>
      </li>
      <li><a href="#" class="flex items-start py-3 px-4 hover:bg-gray-100 rounded-lg">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 me-2" viewBox="0 0 24 24" fill="none"
            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
            class="lucide lucide-layers-2">
            <path d="m16.02 12 5.48 3.13a1 1 0 0 1 0 1.74L13 21.74a2 2 0 0 1-2 0l-8.5-4.87a1 1 0 0 1 0-1.74L7.98 12" />
            <path
              d="M13 13.74a2 2 0 0 1-2 0L2.5 8.87a1 1 0 0 1 0-1.74L11 2.26a2 2 0 0 1 2 0l8.5 4.87a1 1 0 0 1 0 1.74Z" />
          </svg>
          Instalasi
        </a>
      </li>

    </ul>

  </aside>
  <main class="grow relative overflow-y-auto">
    <nav class="bg-white h-14 px-4 flex items-center sticky top-0 shadow-sm border">
      <input type="text" class="h-9 w-72 border-transparent rounded-full hover:bg-gray-100" placeholder="Cari...">
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
            class="px-4 pe-10 py-2 h-10 flex items-center justify-center hover:bg-gray-100 border border-gray-200 rounded-full">
            <span class="select-none absolute inset-y-0 right-0 flex items-center cursor-pointer pr-3">
              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="w-4 h-4">
                <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
              </svg>
            </span>
            Admin
          </button>
          <div x-cloak x-show="open" @click.away="open = false" x-transition
            class="w-48 absolute top-12 right-0 p-2 bg-white border border-gray-200 rounded-lg shadow">
            <div class="px-2 py-1 cursor-pointer hover:bg-sky-100 rounded-lg">First Menu</div>
            <div class="px-2 py-1 cursor-pointer hover:bg-sky-100 rounded-lg">Second Menu</div>
            <div class="px-2 py-1 cursor-pointer hover:bg-sky-100 rounded-lg">Keluar</div>
          </div>
        </div>
      </div>
    </nav>

    <div class="m-6">
      <h4 class="mb-4 font-bold text-2xl text-gray-700">Dashboard</h4>
      <div class="flex flex-col gap-4">
        <div class="bg-white rounded-lg p-6">
          <div class="grid grid-cols-4 gap-2">
            <div class="rounded-lg h-32 bg-green-100 p-4 flex flex-col">
              <h6 class="uppercase text-sm">Pelanggan</h6>
              <div class="grow flex items-center">
                <span class="text-4xl font-bold text-green-700">400</span>
                <svg xmlns="http://www.w3.org/2000/svg" class="ms-auto h-10 w-10 text-green-700 me-2"
                  viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                  stroke-linejoin="round" class="lucide lucide-users-round">
                  <path d="M18 21a8 8 0 0 0-16 0" />
                  <circle cx="10" cy="8" r="5" />
                  <path d="M22 20c0-3.37-2-6.5-4-8a5 5 0 0 0-.45-8.3" />
                </svg>
              </div>
              <p>Pelanggan terdaftar</p>
            </div>
            <div class="rounded-lg h-32 bg-yellow-100 p-4 flex flex-col">
              <h6 class="uppercase text-sm">Pelanggan</h6>
              <div class="grow flex items-center">
                <span class="text-4xl font-bold text-yellow-700">400</span>
                <svg xmlns="http://www.w3.org/2000/svg" class="ms-auto h-10 w-10 text-yellow-700 me-2"
                  viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                  stroke-linejoin="round" class="lucide lucide-users-round">
                  <path d="M18 21a8 8 0 0 0-16 0" />
                  <circle cx="10" cy="8" r="5" />
                  <path d="M22 20c0-3.37-2-6.5-4-8a5 5 0 0 0-.45-8.3" />
                </svg>
              </div>
              <p>Pelanggan terdaftar</p>
            </div>
            <div class="rounded-lg h-32 bg-blue-100 p-4 flex flex-col">
              <h6 class="uppercase text-sm">Pelanggan</h6>
              <div class="grow flex items-center">
                <span class="text-4xl font-bold text-blue-700">400</span>
                <svg xmlns="http://www.w3.org/2000/svg" class="ms-auto h-10 w-10 text-blue-700 me-2"
                  viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                  stroke-linejoin="round" class="lucide lucide-users-round">
                  <path d="M18 21a8 8 0 0 0-16 0" />
                  <circle cx="10" cy="8" r="5" />
                  <path d="M22 20c0-3.37-2-6.5-4-8a5 5 0 0 0-.45-8.3" />
                </svg>
              </div>
              <p>Pelanggan terdaftar</p>
            </div>
            <div class="rounded-lg h-32 bg-red-100 p-4 flex flex-col">
              <h6 class="uppercase text-sm">Pelanggan</h6>
              <div class="grow flex items-center">
                <span class="text-4xl font-bold text-red-700">400</span>
                <svg xmlns="http://www.w3.org/2000/svg" class="ms-auto h-10 w-10 text-red-700 me-2"
                  viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                  stroke-linejoin="round" class="lucide lucide-users-round">
                  <path d="M18 21a8 8 0 0 0-16 0" />
                  <circle cx="10" cy="8" r="5" />
                  <path d="M22 20c0-3.37-2-6.5-4-8a5 5 0 0 0-.45-8.3" />
                </svg>
              </div>
              <p>Pelanggan terdaftar</p>
            </div>
          </div>

        </div>

        <div class="grid grid-cols-2 gap-4">
          <div class="bg-white rounded-lg">
            <div class="flex items-center px-4 py-3 border-b border-gray-300 ">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                class="lucide lucide-line-chart">
                <path d="M3 3v18h18" />
                <path d="m19 9-5 5-4-4-3 3" />
              </svg>
              <h5 class="ms-2 font-bold">Grafik Rata-rata Penggunaan Air</h5>
            </div>
            <div class="p-4">
              <canvas id="myChart"></canvas>
            </div>
          </div>
          <div class="bg-white rounded-lg">
            <div class="flex items-center px-4 py-3 border-b border-gray-300 ">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-hand-coins"><path d="M11 15h2a2 2 0 1 0 0-4h-3c-.6 0-1.1.2-1.4.6L3 17"/><path d="m7 21 1.6-1.4c.3-.4.8-.6 1.4-.6h4c1.1 0 2.1-.4 2.8-1.2l4.6-4.4a2 2 0 0 0-2.75-2.91l-4.2 3.9"/><path d="m2 16 6 6"/><circle cx="16" cy="9" r="2.9"/><circle cx="6" cy="5" r="3"/></svg>
              <h5 class="ms-2 font-bold">Penerimaan Pembayaran</h5>
            </div>
            <div class="p-4">
              <table class="min-w-full">
                <tr>
                  <th class="text-start">#</th>
                  <th class="text-start">Pelanggan</th>
                  <th class="text-start">Jumlah</th>
                  <th class="text-start">Tanggal</th>
                </tr>
                <tbody class="divide-y divide-gray-100">
                  <tr>
                    <td>111451</td>
                    <td>Adi Permana</td>
                    <td>Rp.50.000</td>
                    <td>10/06/2023</td>
                    </tr>
                    <tr>
                      <td>111451</td>
                      <td>Adi Permana</td>
                      <td>Rp.50.000</td>
                      <td>10/06/2023</td>
                      </tr>
                </tbody>
                
              </table>
              
            </div>
          </div>
        </div>
      </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
      const ctx = document.getElementById('myChart');

      new Chart(ctx, {
        type: 'line',
        data: {
          labels: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun'],
          datasets: [{
            label: 'meter kubik',
            data: [7000, 10000, 8000, 12130, 11500, 15000],
            borderWidth: 2
          }]
        },
        options: {
          scales: {
            y: {
              beginAtZero: true
            }
          },
          tension: 0.3,
        }
      });
    </script>
  </main>

  <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.14.0/dist/cdn.min.js"></script>
</body>

</html>
