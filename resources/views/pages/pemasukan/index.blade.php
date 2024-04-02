@php
  $total = $pemasukan->sum('jumlah');
@endphp
@extends('template.dashboard_layout', ['title' => 'Pemasukan'])

@section('content')
  <div x-data="{ modalDelete: false, deleteId: null }">
    <div class="mb-4 flex items-center">
      <h4 class="font-bold text-2xl text-gray-700">Pemasukan</h4>
      <div class="ms-auto">Total : {{ Akaunting\Money\Money::IDR($total, true)->formatWithoutZeroes() }}</div>
    </div>
    <div class="bg-white rounded-lg shadow-sm p-3 mt-2">
      @if (isset($pemasukan))
        <div class="flex gap-2 mb-2">
          <x-button href="{{ route('pemasukan.create') }}" class="bg-blue-600 rounded">
            <svg xmlns="http://www.w3.org/2000/svg" class="size-5 me-1" viewBox="0 -960 960 960" fill="currentcolor">
              <path d="M440-440H200v-80h240v-240h80v240h240v80H520v240h-80v-240Z" />
            </svg>
            Tambah
          </x-button>
        </div>
        <div class="relative overflow-x-auto">
          <table class="table">
            <thead>
              <tr>
                <th>No.</th>
                <th>Nama</th>
                <th>Jumlah</th>
                <th>Tanggal</th>
                <th>Keterangan</th>
                <th></th>
              </tr>
            </thead>
            <tbody>
              @foreach ($pemasukan as $row)
                <tr>
                  <td class="whitespace-nowrap">{{ $pemasukan->firstItem() + $loop->index }}</td>
                  <td class="whitespace-nowrap">{{ $row->nama }}</td>
                  <td class="whitespace-nowrap">{{ Akaunting\Money\Money::IDR($row->jumlah)->formatWithoutZeroes() }}</td>
                  <td class="whitespace-nowrap">{{ $row->created_at->translatedFormat('d F Y') }}</td>
                  <td class="whitespace-nowrap">{{ Str::limit($row->keterangan, 20) }}</td>
                  <td class="whitespace-nowrap">
                    <div class="flex gap-1">
                      <x-button href="{{ route('pemasukan.show', $row->id) }}"
                        class="bg-green-500 hover:bg-hover p-0 size-8 rounded"
                        title="Lihat data">
                        <x-feathericon-eye class="size-4" />
                      </x-button>
                      <x-button href="{{ route('pemasukan.edit', $row->id) }}"
                        class="bg-yellow-500 hover:bg-hover p-0 size-8 rounded"
                        title="Edit data">
                        <x-feathericon-edit class="size-4" />
                      </x-button>
                      <x-button
                        class="bg-red-500 hover:bg-hover p-0 size-8 rounded"
                        @click="modalDelete = true; deleteId='{{ $row->id }}'"
                        title="Hapus data"
                        >
                        <x-feathericon-trash-2 class="size-4" />
                      </x-button>
                    </div>
                  </td>
                </tr>
              @endforeach

              @if ($pemasukan->count() == 0)
                <tr>
                  <td colspan="4" class="text-center">Tidak ada data!</td>
                </tr>
              @endif

            </tbody>
          </table>

        </div>
      @else
        <p class="text-center">Silahkan pilih bulan, tahun, dan RT/RW pada opsi di atas lalu tekan Oke</p>
      @endif
    </div>

    {{-- Modal delete --}}
    <div tabindex="-1" aria-hidden="true"
      class="bg-black/60 z-[99999] overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 justify-center items-center w-full md:inset-0 h-full max-h-full flex"
      x-show="modalDelete" x-transition.opacity>
      <div class="relative p-4 w-full max-w-xl max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded shadow dark:bg-gray-700" 
          x-show="modalDelete" x-transition>
          <!-- Modal header -->
          <div class="flex items-center justify-between py-2 px-3 border-b rounded-t dark:border-gray-600">
            <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
              Hapus
            </h3>
            <button
              class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
               @click="modalDelete = false; deleteId = null">
              <x-feathericon-x class="size-5" />
              <span class="sr-only">Close modal</span>
            </button>
          </div>
          <!-- Modal body -->
          <div class="p-2 space-y-4">
            <x-feathericon-trash-2 class="mx-auto size-16 text-red-500 my-4" />
            <p class="text-center">Apakah Anda yakin ingin menghapus data?</p>
          </div>
          <!-- Modal footer -->
          <div class="flex items-center gap-2 justify-end p-3 border-t border-gray-200 rounded-b dark:border-gray-600">
            <form :action="'{{ route('pemasukan.destroy', '') }}/' + deleteId" method="post">
              @csrf
              @method('DELETE')
              <x-button type="submit" class="rounded bg-red-500 hover:bg-hover">
                Hapus
              </x-button>
            </form>
            <x-button class="rounded" x-data="" @click="modalDelete = false; deleteId = null">
              Batal
            </x-button>

          </div>
        </div>
      </div>
    </div>

  </div>

@endsection
