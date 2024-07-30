@extends('template.dashboard_layout', ['title' => 'Pemakaian Air Bulanan'])

@section('content')
  <div x-data="{ modalTerbitkanTagihan: false }">
    <h4 class="mb-4 font-bold text-2xl text-gray-700">Pemakaian Air Bulanan</h4>
    <div class="bg-white rounded-lg shadow-sm p-5">

      <form action="" method="get" class="mx-auto flex gap-2 flex-wrap md:flex-nowrap">
        <div class="flex w-full lg:w-72">
          <label for="bulan"
            class="bg-gray-50 border border-gray-300 border-r-0 px-3 rounded-s flex items-center font-medium">Bulan</label>
          <x-input-select id="bulan" placeholder="123" class="rounded-e rounded-s-none border-s-0" name="bulan">
            <option value="1" {{ request('bulan') == 1 ? 'selected' : '' }}>Januari</option>
            <option value="2" {{ request('bulan') == 2 ? 'selected' : '' }}>Februari</option>
            <option value="3" {{ request('bulan') == 3 ? 'selected' : '' }}>Maret</option>
            <option value="4" {{ request('bulan') == 4 ? 'selected' : '' }}>April</option>
            <option value="5" {{ request('bulan') == 5 ? 'selected' : '' }}>Mei</option>
            <option value="6" {{ request('bulan') == 6 ? 'selected' : '' }}>Juni</option>
            <option value="7" {{ request('bulan') == 7 ? 'selected' : '' }}>Juli</option>
            <option value="8" {{ request('bulan') == 8 ? 'selected' : '' }}>Agustus</option>
            <option value="9" {{ request('bulan') == 9 ? 'selected' : '' }}>September</option>
            <option value="10" {{ request('bulan') == 10 ? 'selected' : '' }}>Oktober</option>
            <option value="11" {{ request('bulan') == 11 ? 'selected' : '' }}>November</option>
            <option value="12" {{ request('bulan') == 12 ? 'selected' : '' }}>Desember</option>
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

      @if (isset($penggunaan))
        <div class="flex gap-2 mb-2">
          <x-button class="bg-blue-600 rounded" @click="modalTerbitkanTagihan = true">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="size-5 me-1" fill="currentcolor"><g><path d="M0,0h24v24H0V0z" fill="none"/></g><g><path d="M14,2H6C4.9,2,4.01,2.9,4.01,4L4,20c0,1.1,0.89,2,1.99,2H18c1.1,0,2-0.9,2-2V8L14,2z M18,20H6V4h7v5h5V20z M8.82,13.05 L7.4,14.46L10.94,18l5.66-5.66l-1.41-1.41l-4.24,4.24L8.82,13.05z"/></g></svg>
            Terbitkan Tagihan
          </x-button>
        </div>
        <div class="relative overflow-x-auto">
          <table class="table">
            <thead>
              <tr>
                {{-- <th><input type="checkbox" id="select_all"></th> --}}
                <th>Bulan / Tahun</th>
                <th>Nama</th>
                <th>No. Pelanggan</th>
                <th>Pemakaian Air</th>
                <th></th>
              </tr>
            </thead>
            <tbody>
              @foreach ($penggunaan as $row)
                <tr>
                  {{-- <td><input type="checkbox" name="selected_id[]" value="{{ $row->pelanggan_id }}"></td> --}}
                  <td class="whitespace-nowrap">{{ $row->bulan }} / {{ $row->tahun }}</td>
                  <td class="whitespace-nowrap">{{ $row->nama }}</td>
                  <td class="whitespace-nowrap">{{ $row->no_pelanggan }}</td>
                  <td class="whitespace-nowrap">{{ $row->penggunaan_air }} m&sup3;</td>

                  <td class="whitespace-nowrap">
                    <div class="flex gap-1">
                      <a href="{{ route('tagihan.create', $row->id) }}" target="_blank"
                        class="ms-1 inline-flex items-center bg-green-500 rounded px-2 py-1.5 text-sm text-white hover:bg-hover">
                        <x-feathericon-edit class="h-4 w-4 me-1" />Buat Tagihan</a>
                    </div>
                  </td>
                </tr>
              @endforeach

              @if ($penggunaan->count() == 0)
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

    @isset($penggunaan)
        
    
    {{-- Modal terbitkan tagihan --}}
    <div tabindex="-1" aria-hidden="true"
      class="bg-black/60 z-[99999] overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 justify-center items-center w-full md:inset-0 h-full max-h-full flex"
      x-data="" x-show="modalTerbitkanTagihan" x-transition.opacity>
      <div class="relative p-4 w-full max-w-xl max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded shadow dark:bg-gray-700" x-data=""
          x-show="modalTerbitkanTagihan" x-transition>
          <!-- Modal header -->
          <div class="flex items-center justify-between py-2 px-3 border-b rounded-t dark:border-gray-600">
            <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
              Terbitkan Tagihan Pembayaran Air
            </h3>
            <button
              class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
              x-data="" @click="modalTerbitkanTagihan = false">
              <x-feathericon-x class="size-5" />
              <span class="sr-only">Close modal</span>
            </button>
          </div>
          <!-- Modal body -->
          <div class="p-5 space-y-4">
            <table class="w-full">
              <tr>
                <td>Bulan</td>
                <td class="w-fit">:</td>
                <td>{{ request('bulan') }}</td>
              </tr>
              <tr>
                <td>Tahun</td>
                <td class="w-fit">:</td>
                <td>{{ request('tahun') }}</td>
              </tr>
              <tr>
                <td>RT</td>
                <td class="w-fit">:</td>
                <td>{{ request('rt') }}</td>
              </tr>
              <tr>
                <td>RW</td>
                <td class="w-fit">:</td>
                <td>{{ request('rw') }}</td>
              </tr>
             
            </table>
            <p>Sebanyak {{ $penggunaan->count() }} tagihan akan diterbitkan. Setelah tagihan diterbitkan, petugas lapangan dapat mulai melakukan penarikan pembayaran.</p>
          </div>
          <!-- Modal footer -->
          <div class="flex items-center gap-2 justify-end p-3 border-t border-gray-200 rounded-b dark:border-gray-600">
            <form action="{{ route('tagihan.terbitkan') }}" method="post">
              @csrf
              <input type="hidden" name="rt" value="{{ request('rt')}}">
              <input type="hidden" name="rw" value="{{ request('rw')}}">
              <input type="hidden" name="bulan" value="{{ request('bulan')}}">
              <input type="hidden" name="tahun" value="{{ request('tahun')}}">
              <x-button type="submit" class="rounded bg-primary-600 hover:bg-hover">
                Konfirmasi
              </x-button>
            </form>
            <x-button class="rounded bg-gray-600 hover:bg-hover" x-data="" @click="modalTerbitkanTagihan = false">
              Batal
            </x-button>

          </div>
        </div>
      </div>
    </div>
    @endisset

  </div>


@endsection
