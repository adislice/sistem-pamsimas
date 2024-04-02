@extends('template.dashboard_layout', ['back' => route('pemasukan.index'), 'title' => 'Detail Pemasukan'])

@section('content')
  <div x-data="{ modalDelete: false, deleteId: null }">
    <div class="flex">
      <div class="">
        <h4 class="mb-0 font-bold text-2xl text-gray-700">Detail Pemasukan</h4>
        <p class="mb-4 text-gray-500">Detail pemasukan #{{ $pemasukan->id }}</p>
      </div>
      <div class="flex gap-1 items-center ms-auto">
        <x-button href="{{ route('pemasukan.edit', $pemasukan->id) }}"
          class="rounded bg-yellow-500 hover:bg-hover py-1.5 px-3">
          <x-feathericon-edit class="size-4 me-2" />
          Edit
        </x-button>
        <x-button @click="modalDelete = true; deleteId='{{ $pemasukan->id }}'"
          class="rounded bg-red-500 hover:bg-hover py-1.5 px-3">
          <x-feathericon-trash-2 class="size-4 me-2" />
          Hapus
        </x-button>
      </div>
    </div>
    <div class="bg-white rounded-lg shadow-sm p-5">
      <div class="flex flex-col">
        <div class="mb-3">
          <div class="font-medium">Nama</div>
          <div class="text-gray-600">{{ $pemasukan->nama }}</div>
        </div>
        <div class="mb-3">
          <div class="font-medium">Jumlah</div>
          <div class="text-gray-600">{{ Akaunting\Money\Money::IDR($pemasukan->jumlah)->formatWithoutZeroes() }}</div>
        </div>
        <div class="mb-3">
          <div class="font-medium">Tanggal</div>
          <div class="text-gray-600">{{ $pemasukan->created_at->translatedFormat('d F Y') }}</div>
        </div>
        <div class="mb-3">
          <div class="font-medium">Keterangan</div>
          <div class="text-gray-600">{{ $pemasukan->keterangan }}</div>
        </div>
      </div>
    </div>

    {{-- Modal delete --}}
    <div tabindex="-1" aria-hidden="true"
      class="bg-black/60 z-[99999] overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 justify-center items-center w-full md:inset-0 h-full max-h-full flex"
      x-show="modalDelete" x-transition.opacity>
      <div class="relative p-4 w-full max-w-xl max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded shadow dark:bg-gray-700" x-show="modalDelete" x-transition>
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
