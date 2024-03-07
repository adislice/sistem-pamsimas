@extends('template.dashboard_layout', ['title' => 'Pencatatan Meteran'])

@section('content')
  <h4 class="mb-4 font-bold text-2xl text-gray-700">Pencatatan Meteran</h4>
  <div class="bg-white rounded-lg shadow-sm p-5">

    <form action="" method="get" class="mx-auto flex gap-2 flex-wrap md:flex-nowrap">
      <div class="flex w-full lg:w-72">
        <label for="bulan"
          class="bg-gray-50 border border-gray-300 border-r-0 px-3 rounded-s flex items-center font-medium">Bulan</label>
        <x-input-select id="bulan" placeholder="123" class="rounded-e rounded-s-none border-s-0" name="bulan">
          <option value="1">Januari</option>
        </x-input-select>
      </div>
      <div class="flex w-full lg:w-72">
        <label for="tahun"
          class="bg-gray-50 border border-gray-300 border-r-0 px-3 rounded-s flex items-center font-medium">Tahun</label>
        <x-input-select id="tahun" placeholder="123" class="rounded-e rounded-s-none border-s-0" name="tahun">
          <option value="2023" {{ request('tahun') == '2023' ? 'selected' : '' }}>2023</option>
          <option value="2024" {{ request('tahun') == '2024' ? 'selected' : '' }}>2024</option>
          <option value="2025" {{ request('tahun') == '2025' ? 'selected' : '' }}>2025</option>
        </x-input-select>
      </div>
      <div class="flex w-full lg:w-72">
        <label for="rt"
          class="bg-gray-50 border border-gray-300 border-r-0 px-3 rounded-s flex items-center font-medium">RT</label>
        <x-input-select id="rt" placeholder="123" class="rounded-e rounded-s-none border-s-0" name="rt">
          @foreach ($select_rt as $item)
            <option value="{{ $item->rt }}" {{ request('rt') == $item->rt ? 'selected' : '' }}>{{ $item->rt }}
            </option>
          @endforeach
        </x-input-select>
      </div>
      <div class="flex w-full lg:w-72">
        <label for="rw"
          class="bg-gray-50 border border-gray-300 border-r-0 px-3 rounded-s flex items-center font-medium">RW</label>
        <x-input-select id="rw" placeholder="123" class="rounded-e rounded-s-none border-s-0" name="rw">
          @foreach ($select_rw as $item)
            <option value="{{ $item->rw }}" {{ request('rw') == $item->rw ? 'selected' : '' }}>{{ $item->rw }}
            </option>
          @endforeach
        </x-input-select>
      </div>

      <x-button type="submit" class="rounded min-w-24 w-full md:w-fit">
        Oke
      </x-button>
    </form>
  </div>

  <div class="bg-white rounded-lg shadow-sm p-5 mt-2">
    <div class="hidden flex mb-4 gap-1 items-center">
      <div class=" gap-1 items-center ms-auto">
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

    @if ($list_pelanggan != null)
      <div class="relative overflow-x-auto">
        <table class="table">
          <thead>
            <tr>
              <th>No. Pelanggan</th>
              <th>Nama Pelanggan</th>
              <th>Tgl. Dicatat</th>
              <th></th>
            </tr>
          </thead>
          <tbody>
            @foreach ($list_pelanggan as $row)
              <tr>
                <td class="whitespace-nowrap">{{ $row->no_pelanggan }}</td>
                <td class="whitespace-nowrap">{{ $row->nama }}</td>
                <td class="whitespace-nowrap text-sm">
                  @if ($row->created_at != null)
                    {{ $row->created_at->format('d/m/Y') }}
                  @else
                    Belum dicatat
                  @endif
                </td>
                <td class="whitespace-nowrap">
                  <div class="flex gap-1">
                    <a href="{{ route('pencatatan_meteran.catat', $row->id) . '?' . request()->getQueryString() }}"
                      target="_blank"
                      class="ms-1 inline-flex items-center bg-green-500 rounded px-2 py-1 text-sm text-white">
                      <x-feathericon-edit class="h-4 w-4 me-1" />Catat</a>
                  
                    @if ($row->pencatatan_id)
                    <a href="{{ route('pencatatan_meteran.show', $row->pencatatan_id ?? 0) }}"
                      class="inline-flex items-center rounded hover:underline font-medium text-sm p-2 gap-1 bg-blue-500 text-white"
                      title="Lihat">
                      <x-feathericon-eye class="h-4 w-4" />
                    </a>
                    @else 
                    <button
                      class="inline-flex items-center rounded hover:underline font-medium text-sm p-2 gap-1 bg-gray-300 text-gray-400"
                      title="Lihat" disabled>
                      <x-feathericon-eye class="h-4 w-4" />
                    </button>
                    @endif

                  </div>

                </td>
              </tr>
            @endforeach

          </tbody>
        </table>

      </div>
    @else
      <p class="text-center">Silahkan pilih bulan, tahun, dan RT/RW pada opsi di atas lalu tekan Oke</p>
    @endif
  </div>

  <!-- Main modal -->

  <div tabindex="-1" aria-hidden="true"
    class="bg-black/60 z-[99999] overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 justify-center items-center w-full md:inset-0 h-full max-h-full flex"
    x-data="" x-show="$store.delete_modal.isOpened" x-transition.opacity>
    <div class="relative p-4 w-full max-w-xl max-h-full">
      <!-- Modal content -->
      <div class="relative bg-white rounded shadow dark:bg-gray-700" x-data=""
        x-show="$store.delete_modal.isOpened" x-transition>
        <!-- Modal header -->
        <div class="flex items-center justify-between py-2 px-3 border-b rounded-t dark:border-gray-600">
          <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
            Hapus
          </h3>
          <button
            class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
            x-data="" @click="$store.delete_modal.hide()">
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
            <x-button type="submit" size="sm" class="rounded-md bg-red-700 hover:bg-red-800">
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

  <span
    class="hidden form-select col-12 form-select-sm form-input pagination dt-paging-button page-item disabled active "></span>

  @push('page-style')
    <link
      href="https://cdn.datatables.net/v/bs5/jszip-3.10.1/dt-2.0.8/b-3.0.2/b-html5-3.0.2/b-print-3.0.2/datatables.min.css"
      rel="stylesheet">
  @endpush
  @push('page-script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>
    <script
      src="https://cdn.datatables.net/v/bs5/jszip-3.10.1/dt-2.0.8/b-3.0.2/b-html5-3.0.2/b-print-3.0.2/datatables.min.js">
    </script>

    <script>
      new DataTable('#myTable');
    </script>

    <script>
      document.addEventListener('alpine:init', () => {
        Alpine.store('delete_modal', {
          isOpened: false,
          dataHapus: {},
          formAction: "",

          showWithId(evt, action) {
            this.dataHapus = {
              id: evt.dataset.id,
              nama: evt.dataset.nama
            }
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
