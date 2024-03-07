@extends('template.dashboard_layout', [
    'back' => route('pencatatan_meteran.index', [
        'rt' => Session::get('pencatatan_meteran.rt'),
        'rw' => Session::get('pencatatan_meteran.rw'),
        'bulan' => Session::get('pencatatan_meteran.bulan'),
        'tahun' => Session::get('pencatatan_meteran.tahun'),
    ]),
    'title' => 'Detail Pencatatan Meteran',
])

@section('content')
  <h4 class="mb-0 font-bold text-2xl text-gray-700 mb-4">Detail Pencatatan Meteran</h4>

  <div class="bg-white rounded-lg shadow-sm p-5">
    {{-- <h5 class="text-xl font-semibold mb-2">Detail Pelanggan</h5> --}}
    <table class="table">
      <tr>
        <td class="font-medium">Nama</td>
        <td class="w-0">:</td>
        <td>{{ $data->pelanggan->nama }}</td>
      </tr>
      <tr>
        <td class="font-medium">Nomor Pelanggan</td>
        <td class="w-0">:</td>
        <td>{{ $data->pelanggan->no_pelanggan }}</td>
      </tr>
      <tr>
        <td class="font-medium">RT / RW</td>
        <td class="w-0">:</td>
        <td>RT.{{ $data->pelanggan->rt }} / RW.{{ $data->pelanggan->rw }}</td>
      </tr>
      <tr>
        <td class="font-medium">Bulan</td>
        <td class="w-0">:</td>
        <td>{{ $data->bulan }}</td>
      </tr>
      <tr>
        <td class="font-medium">Tahun</td>
        <td class="w-0">:</td>
        <td>{{ $data->tahun }}</td>
      </tr>
      <tr>
        <td class="font-medium">Angka Meteran</td>
        <td class="w-0">:</td>
        <td>{{ $data->angka_meteran }}</td>
      </tr>
      <tr>
        <td class="font-medium">Dicatat Oleh</td>
        <td class="w-0">:</td>
        <td>{{ $data->petugas->nama }}</td>
      </tr>
      <tr>
        <td class="font-medium ">Foto Meteran</td>
        <td class="w-0">:</td>
        <td> <img src="{{ asset('/storage/' . $data->foto) }}" class="w-72 h-auto">
        </td>
      </tr>

    </table>

  </div>
@endsection
