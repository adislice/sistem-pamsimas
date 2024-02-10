@extends('template.dashboard_layout', ['back' => route('pelanggan.index')])

@section('content')
  <h4 class="mb-0 font-bold text-2xl text-gray-700">Detail Pelanggan</h4>
  <h4 class="mb-4 text-gray-500">Informasi detail pelanggan </h4>
  <div class="bg-white rounded-lg shadow-sm p-5">

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
                    <span class="rounded-full bg-green-400 text-white">Aktif</span>
                @else
                    <span class="rounded-full bg-red-400 text-white px-3 py-1 text-sm">Tidak aktif</span>
                @endif
            </td>
        </tr>
        
    </table>
    
  </div>
@endsection
