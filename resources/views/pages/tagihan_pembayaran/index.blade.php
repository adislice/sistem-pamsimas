@php
  use Akaunting\Money\Money;
@endphp
@extends('template.dashboard_layout', ['title' => 'Tagihan Pembayaran'])

@section('content')
  <div x-data="{ modalBayar: false, modalBayarItem: {} }">
    <h4 class="mb-4 font-bold text-2xl text-gray-700">Tagihan Pembayaran</h4>
    <div class="bg-white rounded-lg shadow-sm p-4">

      <form action="" method="get" class="mx-auto flex gap-2 flex-wrap md:flex-nowrap">
        <div class="flex w-full lg:w-72">
          <label for="bulan"
            class="bg-gray-50 text-sm border border-gray-300 border-r-0 px-3 rounded-s flex items-center font-medium">Bulan</label>
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
            class="bg-gray-50 text-sm border border-gray-300 border-r-0 px-3 rounded-s flex items-center font-medium">Tahun</label>
          <x-input-select id="tahun" placeholder="123" class="rounded-e rounded-s-none border-s-0" name="tahun">
            <option value="2023" {{ request('tahun') == '2023' ? 'selected' : '' }}>2023</option>
            <option value="2024" {{ request('tahun') == '2024' ? 'selected' : '' }}>2024</option>
            <option value="2025" {{ request('tahun') == '2025' ? 'selected' : '' }}>2025</option>
          </x-input-select>
        </div>
        <div class="flex w-full lg:w-72">
          <label for="rt"
            class="bg-gray-50 text-sm border border-gray-300 border-r-0 px-3 rounded-s flex items-center font-medium">RT</label>
          <x-input-select id="rt" placeholder="123" class="rounded-e rounded-s-none border-s-0" name="rt">
            @foreach ($select_rt as $item)
              <option value="{{ $item->rt }}" {{ request('rt') == $item->rt ? 'selected' : '' }}>
                {{ $item->rt }}
              </option>
            @endforeach
          </x-input-select>
        </div>
        <div class="flex w-full lg:w-72">
          <label for="rw"
            class="bg-gray-50 text-sm border border-gray-300 border-r-0 px-3 rounded-s flex items-center font-medium">RW</label>
          <x-input-select id="rw" placeholder="123" class="rounded-e rounded-s-none border-s-0" name="rw">
            @foreach ($select_rw as $item)
              <option value="{{ $item->rw }}" {{ request('rw') == $item->rw ? 'selected' : '' }}>
                {{ $item->rw }}
              </option>
            @endforeach
          </x-input-select>
        </div>

        <x-button type="submit" class="rounded min-w-24 w-full md:w-fit">
          Oke
        </x-button>
      </form>
    </div>

    <div class="bg-white rounded-lg shadow-sm p-3 mt-2">
      @if (isset($tagihan))
      <div class="mb-3">
        <x-button href="{!! route('tagihan.cetak_kwitansi') . '?' . request()->getQueryString()  !!}" target="_blank" class="rounded bg-blue-500 hover:bg-hover gap-1" >
          <x-feathericon-printer class="size-4" />
          Cetak Kwitansi (Semua)</x-button>
      </div>
        <div class="relative overflow-x-auto">
          <table class="table">
            <thead>
              <tr>
                <th class="whitespace-nowrap">No.</th>
                <th class="whitespace-nowrap">Bulan / Tahun</th>
                <th class="whitespace-nowrap">Nama</th>
                <th class="whitespace-nowrap">No. Pelanggan</th>
                <th class="whitespace-nowrap">Pemakaian Air</th>
                <th class="whitespace-nowrap">Total Bayar</th>
                <th class="whitespace-nowrap">Status</th>
                <th></th>
              </tr>
            </thead>
            <tbody>
              @foreach ($tagihan as $row)
                <tr class="last:dropdown-invert">
                  <td class="whitespace-nowrap">{{ $tagihan->firstItem() + $loop->index }}</td>
                  <td class="whitespace-nowrap">{{ $row->bulan }} / {{ $row->tahun }}</td>
                  <td class="whitespace-nowrap text-ellipsis overflow-hidden max-w-48">{{ $row->pelanggan->nama }}</td>
                  <td class="whitespace-nowrap">{{ $row->pelanggan->no_pelanggan }}</td>
                  <td class="whitespace-nowrap">{{ $row->penggunaan_air }} m&sup3;</td>
                  <td class="whitespace-nowrap">{{ Money::IDR($row->total_tagihan)->formatWithoutZeroes() }}</td>
                  <td class="whitespace-nowrap ">
                    <span
                      class="inline-block px-1.5 text-sm gap-1 border w-fit mx-auto rounded {{ $row->status_pembayaran == 'paid' ? 'border-green-300 bg-green-100 text-green-700' : 'border-yellow-300 bg-yellow-100 text-yellow-700' }}">
                      {{ $row->status_pembayaran == 'paid' ? 'Paid' : 'Unpaid' }}
                    </span>
                  </td>
                  <td class="whitespace-nowrap">
                    <div class="flex gap-1">
                      @if ($row->status_pembayaran == 'unpaid')
                      <x-button class="bg-green-500 px-2 py-1 text-sm rounded gap-1 hover:bg-hover"
                      @click="modalBayar=true;modalBayarItem={id: {{ $row->id }}, total: '{{ money($row->total_tagihan, 'IDR')}}', pelanggan: '{{ $row->pelanggan->nama }} ({{ $row->pelanggan->no_pelanggan }})' }"
                      >
                        <x-feathericon-check-circle class="h-4 w-4" />
                        Konfirmasi
                      </x-button>
                      @else
                      <x-button class="bg-gray-300 px-2 py-1 text-sm rounded gap-1 cursor-not-allowed text-gray-400 hover:bg-gray-300"
                      >
                        <x-feathericon-check-circle class="h-4 w-4" />
                        Konfirmasi
                      </x-button>
                      @endif
                      {{-- <a href="{{ route('tagihan.create', $row->id) }}" target="_blank"
                        class="ms-1 inline-flex items-center bg-blue-500 rounded p-2 text-sm text-white hover:bg-hover">
                        <x-feathericon-eye class="h-4 w-4" /></a> --}}
                        <a href="{{ route('tagihan.cetak_kwitansi_satuan', $row->id) }}" target="_blank"
                          class="ms-1 inline-flex items-center bg-blue-500 rounded p-2 text-sm text-white hover:bg-hover">
                          <x-feathericon-printer class="size-4" />
                        </a>
                          
                    </div>
                  </td>
                </tr>
              @endforeach

              @if ($tagihan->count() == 0)
                <tr>
                  <td colspan="7" class="text-center">Tidak ada data!</td>
                </tr>
              @endif

            </tbody>
          </table>
          <div class="mt-4 mx-2">
            {{ $tagihan->withQueryString()->links() }}
          </div>

        </div>
      @else
        <p class="text-center">Silahkan pilih bulan, tahun, dan RT/RW pada opsi di atas lalu tekan Oke</p>
      @endif
    </div>

    {{-- Modal konfrmasi bayar --}}
    <div tabindex="-1" aria-hidden="true"
      class="bg-black/60 z-[99999] overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 justify-center items-center w-full md:inset-0 h-full max-h-full flex" 
      x-show="modalBayar" x-transition.opacity>
      <div class="relative p-4 w-full max-w-xl max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded shadow dark:bg-gray-700"
          x-show="modalBayar" x-transition>
          <!-- Modal header -->
          <div class="flex items-center justify-between py-2 px-3 border-b rounded-t dark:border-gray-600">
            <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
              Konfirmasi Pembayaran
            </h3>
            <button
              class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
              @click="modalBayar = false">
              <x-feathericon-x class="size-5" />
              <span class="sr-only">Close modal</span>
            </button>
          </div>
          <!-- Modal body -->
          <div class="p-5 space-y-4">
            {{-- <x-feathericon-trash-2 class="mx-auto size-16 text-red-500 my-4" /> --}}
            <div class="mx-auto size-24 rounded-full bg-blue-50">
              <img class="" src="https://cdn-icons-png.freepik.com/256/8552/8552920.png" alt="">
            </div>
            <p class="text-center">Terima dan konfirmasi pembayaran dari <span class="font-semibold" x-text="modalBayarItem.pelanggan"></span>
              sebesar <span class="font-semibold" x-text="modalBayarItem.total"></span> ?
            </p>
          </div>
          <!-- Modal footer -->
          <div class="flex items-center gap-2 justify-end p-3 border-t border-gray-200 rounded-b dark:border-gray-600">
            <form action="{{ route('tagihan.konfirmasi') }}" method="post">
              @csrf
              <input type="hidden" name="id" x-model="modalBayarItem.id">
              <x-button type="submit" size="sm" class="rounded bg-green-600 hover:bg-hover">
                Yakin
              </x-button>
            </form>
            <x-button size="sm" class="rounded bg-gray-500 hover:bg-hover" @click="modalBayar = false">
              Batal
            </x-button>

          </div>
        </div>
      </div>
    </div>

  </div>

@endsection
