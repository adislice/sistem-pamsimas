@extends('template.dashboard_layout', ['title' => 'Pengeluaran'])

@section('content')
  <div x-data="{ modalDelete: false, deleteId: null }">
    <div class="mb-4 flex items-center">
      <h4 class="font-bold text-2xl text-gray-700">Laporan</h4>

    </div>
    <div class="bg-white rounded-lg shadow-sm p-4 mt-2">
      <div class="w-1/2">
        <h6 class="font-semibold text-lg mb-3">Pemakaian Air</h6>
        <form action="{{ route('laporan.pemakaian_air') }}">
          <div class="grid grid-cols-1 md:grid-cols-3 gap-1">
            <label class="mb-3 block">
              <span">Tahun</span>
              <x-input-select id="tahun" placeholder="123" class="rounded" name="tahun">
                @for ($i = 2023; $i < 2030; $i++)
                <option value="{{ $i }}" {{ request('tahun') == $i ? 'selected' : '' }}>{{ $i }}</option>
                @endfor
              </x-input-select>
            </label>
            <label class="mb-3 block">
              <span">RT</span>
              <x-input-select id="rt" placeholder="123" class="rounded" name="rt">
                @foreach ($select_rt as $item)
                  <option value="{{ $item->rt }}" {{ request('rt') == $item->rt ? 'selected' : '' }}>{{ $item->rt }}
                  </option>
                @endforeach
              </x-input-select>
            </label>
            <label class="mb-3 block">
              <span">RW</span>
              <x-input-select id="rw" placeholder="123" class="rounded" name="rw">
                @foreach ($select_rw as $item)
                  <option value="{{ $item->rw }}" {{ request('rw') == $item->rw ? 'selected' : '' }}>{{ $item->rw }}
                  </option>
                @endforeach
              </x-input-select>
            </label>
          </div>
          <x-button type="submit" class="rounded bg-primary-600 hover:bg-hover ms-auto">Cetak Laporan</x-button>
        </form>
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
            <form :action="'{{ route('pengeluaran.destroy', '') }}/' + deleteId" method="post">
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
