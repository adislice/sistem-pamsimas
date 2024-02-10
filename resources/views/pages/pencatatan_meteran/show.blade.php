@extends('template.dashboard_layout', ['back' => route('pencatatan_meteran.index'), 'title' => "Detail"])

@section('content')
  <h4 class="mb-0 font-bold text-2xl text-gray-700 mb-4">Riwayat Pencatatan Meteran</h4>
  
  <div class="bg-white rounded-lg shadow-sm p-5">
    <h5 class="text-xl font-semibold mb-2">Detail Pelanggan</h5>
    <table class="table">
        <tr>
            <td class="font-medium">Nama</td>
            <td class="w-0">:</td>
            <td>{{ $pelanggan->nama }}</td>
        </tr>
        <tr>
            <td class="font-medium">Nomor Pelanggan</td>
            <td class="w-0">:</td>
            <td>{{ $pelanggan->no_pelanggan }}</td>
        </tr>
        <tr>
            <td class="font-medium">RT / RW</td>
            <td class="w-0">:</td>
            <td>RT.{{ $pelanggan->rt }} / RW.{{ $pelanggan->rw }}</td>
        </tr>
        <tr>
            <td class="font-medium">Nomor Telepon</td>
            <td class="w-0">:</td>
            <td>{{ $pelanggan->no_telepon }}</td>
        </tr>
        <tr>
            <td class="font-medium">Status</td>
            <td class="w-0">:</td>
            <td>
                @if ($pelanggan->is_aktif == 1)
                    <span class="rounded-full bg-green-500 text-white px-3 py-1 text-sm">Aktif</span>
                @else
                    <span class="rounded-full bg-red-500 text-white px-3 py-1 text-sm">Tidak aktif</span>
                @endif
            </td>
        </tr>
        
    </table>

    <h5 class="text-xl font-semibold mb-2 mt-5">Riwayat Pemakaian Air</h5>
    
    <div class="relative overflow-x-auto">
      <table class="table" id="myTable" style="width: 100%">
        <thead>
          <tr>
            <th>Bulan</th>
                <th>Tahun</th>
                <th>Angka Meteran</th>
                <th>Jumlah Pemakaian</th>
                <th>Tanggal dicatat</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($riwayat as $row)
            <tr>
              <td>{{ $row->bulan }}</td>
            <td>{{ $row->tahun }}</td>
            <td>{{ $row->angka_meteran }}</td>
            <td>{{ $row->jml_pemakaian }}</td>
            <td>{{ $row->created_at->format("d/m/Y") }}</td>
              
            </tr>
          @endforeach

        </tbody>
      </table>
    </div>
    
  </div>
@endsection
