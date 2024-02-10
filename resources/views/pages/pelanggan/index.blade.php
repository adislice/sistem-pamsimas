@extends('template.dashboard_layout', ['title' => "Data Pelanggan"])

@section('content')
  <h4 class="mb-4 font-bold text-2xl text-gray-700">Data Pelanggan</h4>
  <div class="bg-white rounded-lg shadow-sm p-5">
    <div class="flex mb-4 gap-1 items-center">

      <x-button href="{{ route('pelanggan.create') }}" size="sm" class="rounded">
        {{-- <span class="mdi me-1 text-base">add_circle</span> --}}
        <x-feathericon-plus class="h-4 w-4 me-1" />
        Tambah
      </x-button>
      <div class="flex gap-1 items-center ms-auto">
        <x-outlined-button size="sm" square="true" class="border-blue-600 text-blue-600 hover:bg-blue-600">
          <span class="mdi text-lg">upload</span>
        </x-outlined-button>
        <x-outlined-button size="sm" square="true" class="border-green-600 text-green-600 hover:bg-green-600">
          <span class="mdi text-lg">description</span>
        </x-outlined-button>
        <x-outlined-button size="sm" square="true" class="border-violet-600 text-violet-600 hover:bg-violet-600">
          <span class="mdi text-lg">print</span>
        </x-outlined-button>
        <x-outlined-button size="sm" square="true" class="border-red-700 text-red-700 hover:bg-red-700">
          <span class="mdi text-lg">delete</span>
        </x-outlined-button>
      </div>
    </div>

    <hr>
    {{-- <div class="flex gap-1 my-2"> --}}
      {{-- <div class="flex items-center">
        <p>Menampilkan {{ $pelanggan->count() }} data pelanggan</p>
      </div>
      <form action="" class="flex ms-auto">
        <select name="status" class="form-control-select me-1" onchange="this.form.submit()">
          <option value="">Semua</option>
          <option value="1" {{ request('status') == '1' ? 'selected' : '' }}>Aktif</option>
          <option value="0" {{ request('status') == '0' ? 'selected' : '' }}>Tidak Aktif</option>
        </select>
        <input type="text" name="search" class="form-control-input max-w-72 rounded-r-none" placeholder="Cari..."
          value="{{ request('search') }}">
        <button class="btn text-blue-500 hover:bg-gray-200 border border-gray-300 rounded-l-none border-l-0">Cari</button>
      </form> --}}
    {{-- </div> --}}
    <div class="relative overflow-x-auto">
      <table class="table" id="myTable" style="width: 100%">
        <thead>
          <tr>
            <th>No.</th>
            <th>Nama</th>
            <th>No. Pelanggan</th>
            <th>RT/RW</th>
            <th>No. Telepon</th>
            <th>Status Aktif</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($pelanggan as $item)
            <tr>
              <td>{{ $loop->iteration }}</td>
              <td class="whitespace-nowrap">{{ $item->nama }}</td>
              <td class="whitespace-nowrap">{{ $item->no_pelanggan }}</td>
              <td class="whitespace-nowrap">RT.{{ $item->rt }} / RW.{{ $item->rw }}</td>
              <td class="whitespace-nowrap">{{ $item->no_telepon }}</td>
              <td class="whitespace-nowrap">
                @if ($item->is_aktif)
                  <span class="text-green-500">Aktif</span>
                @else
                  <span class="text-red-500">Tidak Aktif</span>
                @endif
              </td>
              <td class="whitespace-nowrap">
                <a href="{{ route('pelanggan.show', $item->id) }}"
                  class="inline-flex items-center rounded hover:underline font-medium text-sm p-2 gap-1 bg-blue-500 text-white"
                  title="Lihat">
                  <x-feathericon-eye class="h-4 w-4" />


                </a>
                <a href="{{ route('pelanggan.edit', $item->id) }}"
                  class="inline-flex items-center hover:underline font-medium text-sm p-2 rounded gap-1 bg-yellow-500 text-white"
                  title="Edit">
                  <x-feathericon-edit class="h-4 w-4" />


                </a>
                <button
                  class="inline-flex items-center hover:underline font-medium text-sm p-2 rounded gap-1 bg-red-600 text-white"
                  title="Hapus"
                  data-id="{{ $item->id }}"
                  data-nama="{{ $item->nama }}"
                  x-data="" @click="$store.delete_modal.showWithId($el, '{{ route('pelanggan.destroy', $item->id) }}') "
                  >
                  <x-feathericon-trash-2 class="h-4 w-4" />


              </button>

              </td>
            </tr>
          @endforeach

        </tbody>
      </table>
    </div>
  </div>



<!-- Main modal -->

<div  tabindex="-1" aria-hidden="true" class="bg-black/60 z-[99999] overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 justify-center items-center w-full md:inset-0 h-full max-h-full flex" x-data="" x-show="$store.delete_modal.isOpened" x-transition.opacity>
    <div class="relative p-4 w-full max-w-xl max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded shadow dark:bg-gray-700"  x-data="" x-show="$store.delete_modal.isOpened" x-transition>
            <!-- Modal header -->
            <div class="flex items-center justify-between py-2 px-3 border-b rounded-t dark:border-gray-600">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                    Hapus
                </h3>
                <button class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" x-data="" @click="$store.delete_modal.hide()">
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
              <form x-data="" :action="$store.delete_modal.formAction" method="post">
                @csrf
                @method('DELETE')
              <x-button type="submit"  size="sm" class="rounded-md bg-red-700 hover:bg-red-800">
                Hapus
              </x-button>
            </form>
              <x-button size="sm" class="rounded-md" x-data="" @click="$store.delete_modal.hide()">
                Batal
              </x-button>

            </div>
        </div>
    </div>
</div>


  <span class="hidden form-select col-12 form-select-sm form-input pagination dt-paging-button page-item disabled active "></span>

  @push('page-style')
  <link href="https://cdn.datatables.net/v/bs5/jszip-3.10.1/dt-2.0.8/b-3.0.2/b-html5-3.0.2/b-print-3.0.2/datatables.min.css" rel="stylesheet">


  @endpush
  @push('page-script')
  <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>
  <script src="https://cdn.datatables.net/v/bs5/jszip-3.10.1/dt-2.0.8/b-3.0.2/b-html5-3.0.2/b-print-3.0.2/datatables.min.js"></script>

  <script>
    new DataTable('#myTable');
  </script>

  <script>
    document.addEventListener('alpine:init', () => {
        Alpine.store('delete_modal', {
          isOpened : false,
          dataHapus: {},
          formAction: "",

          showWithId(evt, action) {
            this.dataHapus = {id: evt.dataset.id, nama: evt.dataset.nama}
            this.formAction = action
            this.show()
          },

          show() {
            this.isOpened = true
          },

          hide() {
            this.isOpened = false
          }
        });



      })
  </script>

  @endpush
@endsection
