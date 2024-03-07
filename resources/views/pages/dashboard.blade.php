@extends('template.dashboard_layout', ['title' => 'Dashboard | ' . $app_title])

@section('content')
<h4 class="mb-4 font-bold text-2xl text-gray-700">Dashboard</h4>
<div class="flex flex-col gap-4">
  <div class="bg-white rounded-lg p-6">
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-2">
      <div class="rounded-lg h-32 bg-green-100 p-4 flex flex-col">
        <h6 class="uppercase text-sm">Pelanggan</h6>
        <div class="grow flex items-center">
          <span class="text-4xl font-bold text-green-700">400</span>
          <svg xmlns="http://www.w3.org/2000/svg" class="ms-auto h-10 w-10 text-green-700 me-2" viewBox="0 0 24 24"
            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
            class="lucide lucide-users-round">
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
          <svg xmlns="http://www.w3.org/2000/svg" class="ms-auto h-10 w-10 text-yellow-700 me-2" viewBox="0 0 24 24"
            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
            class="lucide lucide-users-round">
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
          <svg xmlns="http://www.w3.org/2000/svg" class="ms-auto h-10 w-10 text-blue-700 me-2" viewBox="0 0 24 24"
            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
            class="lucide lucide-users-round">
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
          <svg xmlns="http://www.w3.org/2000/svg" class="ms-auto h-10 w-10 text-red-700 me-2" viewBox="0 0 24 24"
            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
            class="lucide lucide-users-round">
            <path d="M18 21a8 8 0 0 0-16 0" />
            <circle cx="10" cy="8" r="5" />
            <path d="M22 20c0-3.37-2-6.5-4-8a5 5 0 0 0-.45-8.3" />
          </svg>
        </div>
        <p>Pelanggan terdaftar</p>
      </div>
    </div>

  </div>

  <div class="grid grid-cols-1 lg:grid-cols-2 gap-4">
    <div class="bg-white rounded-lg">
      <div class="flex items-center px-4 py-3 border-b border-gray-300 ">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor"
          stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-line-chart">
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
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor"
          stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-hand-coins">
          <path d="M11 15h2a2 2 0 1 0 0-4h-3c-.6 0-1.1.2-1.4.6L3 17" />
          <path d="m7 21 1.6-1.4c.3-.4.8-.6 1.4-.6h4c1.1 0 2.1-.4 2.8-1.2l4.6-4.4a2 2 0 0 0-2.75-2.91l-4.2 3.9" />
          <path d="m2 16 6 6" />
          <circle cx="16" cy="9" r="2.9" />
          <circle cx="6" cy="5" r="3" />
        </svg>
        <h5 class="ms-2 font-bold">Penerimaan Pembayaran</h5>
      </div>
      <div class="">
        <table class="min-w-full">
          <thead class="border-b border-gray-300">
            <tr>
              <th class="text-start py-2 px-3">#</th>
              <th class="text-start py-2 px-3">Pelanggan</th>
              <th class="text-start py-2 px-3">Jumlah</th>
              <th class="text-start py-2 px-3">Tanggal</th>
            </tr>
          </thead>
          <tbody class="divide-y divide-gray-200">
            <tr>
              <td class="py-2 px-3">111451</td>
              <td class="py-2 px-3">Adi Permana</td>
              <td class="py-2 px-3">Rp.50.000</td>
              <td class="py-2 px-3">10/06/2023</td>
            </tr>
            <tr>
              <td class="py-2 px-3">111451</td>
              <td class="py-2 px-3">Adi Permana</td>
              <td class="py-2 px-3">Rp.50.000</td>
              <td class="py-2 px-3">10/06/2023</td>
            </tr>
          </tbody>

        </table>

      </div>
      
    </div>
  </div>
</div>
@endsection

@push('custom-scripts')
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
@endpush