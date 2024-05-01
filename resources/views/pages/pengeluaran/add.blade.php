@extends('template.dashboard_layout', ['back' => route('pengeluaran.index'), 'title' => 'Tambah Pengeluaran Baru'])

@section('content')
  <h4 class="mb-0 font-bold text-2xl text-gray-700">Tambah Pengeluaran Baru</h4>
  <h4 class="mb-4 text-gray-500">Silahkan lengkapi formulir berikut untuk menambah pengeluaran baru</h4>
  <div class="bg-white rounded-lg shadow-sm p-5">

    <form action="{{ route('pengeluaran.store') }}" method="post" class="flex flex-col">
      @csrf
      <div class="flex justify-center w-full">
        <div class="md:w-1/2 w-full px-1">
          <label class="mb-3 block">
            <span class="font-medium">Nama</span>
              <x-input-text name="nama" placeholder="Masukkan nama pengeluaran" value="{{ old('nama') }}" required />
            @error('nama')
              <small class="text-red-500">{{ $message }}</small>
            @enderror
          </label>

          <label class="mb-3 block">
            <span class="font-medium">Jumlah</span>
              <x-input-text name="jumlah" type="number" step="1" min="1" placeholder="Masukkan jumlah pengeluaran" value="{{ old('jumlah') }}" required />
            @error('jumlah')
              <small class="text-red-500">{{ $message }}</small>
            @enderror
          </label>

          <label class="mb-3 block">
            <span class="font-medium">Penganggung Jawab / Person In Charge</span>
              <x-input-text name="pic" placeholder="Masukkan PIC" value="{{ old('pic') }}" />
            @error('pic')
              <small class="text-red-500">{{ $message }}</small>
            @enderror
          </label>

          <label class="mb-3 block">
            <span class="font-medium">Keterangan (opsional)</span>
              <textarea name="keterangan" placeholder="Masukkan keterangan" class="form-input bg-gray-50 mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-primary-300 focus:ring focus:ring-primary-200 focus:ring-opacity-50" ></textarea>
            @error('jumlah')
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
