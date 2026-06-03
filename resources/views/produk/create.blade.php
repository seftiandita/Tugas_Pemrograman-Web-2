@extends('layouts.app')

@section('content')
<div class="p-6">
    
    <!-- Header -->
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-xl font-bold text-white">Tambah Data Produk</h1>
        <a href="{{ route('produk.index') }}" 
           class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-gray-600">
            Kembali
        </a>
    </div>

    <!-- Card Form -->
    <div class="bg-white shadow rounded p-6">
        <form action="{{ route('produk.store') }}" method="POST">
            @csrf

            <!-- Nama -->
            <div class="mb-4">
                <label class="block mb-1 font-semibold">Nama Produk</label>
                <input type="text" name="nama"
                       class="w-full border rounded px-3 py-2 focus:outline-none focus:ring focus:ring-blue-200"
                       placeholder="Masukkan nama produk">

                @error('nama')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <!-- Kategori -->
            <div class="mb-4">
                <label class="block mb-1 font-semibold">Kategori Produk</label>
                <select name="kategori"
                        class="w-full border rounded px-3 py-2 focus:outline-none focus:ring focus:ring-blue-200">
                    <option value="">Pilih Kategori</option>
                    @foreach ($kategori as $k)
                        <option value="{{ $k->id }}">{{ $k->nama }}</option>
                    @endforeach
                </select>

                @error('kategori')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <!-- Qty -->
            <div class="mb-4">
                <label class="block mb-1 font-semibold">Qty Awal</label>
                <input type="text" name="qty"
                       class="w-full border rounded px-3 py-2 focus:outline-none focus:ring focus:ring-blue-200"
                       placeholder="Masukkan jumlah">
                
                @error('qty')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <!-- Harga Jual -->
            <div class="mb-4">
                <label class="block mb-1 font-semibold">Harga Jual</label>
                <input type="text" name="jual"
                       class="w-full border rounded px-3 py-2 focus:outline-none focus:ring focus:ring-blue-200"
                       placeholder="Masukkan harga jual">
                
                @error('jual')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <!-- Harga Beli -->
            <div class="mb-6">
                <label class="block mb-1 font-semibold">Harga Beli</label>
                <input type="text" name="beli"
                       class="w-full border rounded px-3 py-2 focus:outline-none focus:ring focus:ring-blue-200"
                       placeholder="Masukkan harga beli">
                
                @error('beli')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <!-- Button -->
            <div>
                <button type="submit"
                        class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                    Simpan
                </button>
            </div>

        </form>
    </div>
</div>
@endsection
