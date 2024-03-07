@extends('template.dashboard_layout', ['back' => route('pelanggan.index')])

@section('content')
  <h4 class="mb-0 font-bold text-2xl text-gray-700">Tambah Pelanggan Baru</h4>
  <h4 class="mb-4 text-gray-500">Silahkan lengkapi formulir berikut untuk menambah pelanggan baru</h4>
  <div class="bg-white rounded-lg shadow-sm p-5">

    <form action="{{ route('pelanggan.store') }}" method="post" class="flex flex-col">
      @csrf
      <div class="flex justify-center w-full">
        <div class="md:w-1/2 w-full px-1">
          <label class="mb-3 block">
            <span class="font-medium">Nama</span>
            <input type="text" name="nama"
              class="form-input bg-gray-50 mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
              placeholder="Masukkan nama" value="{{ old('nama') }}" required>
            @error('nama')
              <small class="text-red-500">{{ $message }}</small>
            @enderror
          </label>

          <label class="mb-3 block">
            <span class="font-medium">No. Telepon/HP/WA</span>
            <input type="number" name="no_telepon" min="0"
              class="form-input bg-gray-50 mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
              placeholder="Masukkan nomor telepon" required value="{{ old('no_telepon') }}">
            @error('no_telepon')
              <small class="text-red-500">{{ $message }}</small>
            @enderror
          </label>

          <label class="mb-3 block">
            <span class="font-medium">RT</span>
            <input type="number" name="rt" min="0"
              class="form-input bg-gray-50 mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
              placeholder="Masukkan rt" required value="{{ old('rt') }}">
            @error('rt')
              <small class="text-red-500">{{ $message }}</small>
            @enderror
          </label>

          <label class="mb-3 block">
            <span class="font-medium">RW</span>
            <input type="number" name="rw" min="0"
              class="form-input bg-gray-50 mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
              placeholder="Masukkan rw" required value="{{ old('rw') }}">
            @error('rw')
              <small class="text-red-500">{{ $message }}</small>
            @enderror
          </label>

          <label class="mb-3 block">
            <span class="font-medium">Status</span>
            <select name="is_aktif" class="form-select mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
              <option value="1">Aktif</option>
              <option value="0">Nonaktif</option>
            </select>
            @error('is_aktif')
              <small class="text-red-500">{{ $message }}</small>
            @enderror
          </label>
        </div>
      </div>
      <x-button type="submit"  size="sm" class="rounded mx-auto mt-2">
        Simpan
      </x-button>
    </form>
  </div>
@endsection
