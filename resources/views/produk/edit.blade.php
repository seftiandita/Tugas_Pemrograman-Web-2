@extends('layouts.app')

@section('content')
<div class="p-6">
    
    <!-- Header -->
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-xl font-bold text-white">Edit Data Produk</h1>
        <a href="{{ route('produk.index') }}" 
           class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-gray-600">
            Kembali
        </a>
    </div>

    <!-- Card Form -->
    <div class="bg-white shadow rounded p-6">
        <form action="{{ route('produk.update', $produk->id) }}" method="POST">
            @csrf
            @method('PUT')

            <!-- Nama -->
            <div class="mb-4">
                <label class="block mb-1 font-semibold">Nama Produk</label>
                <input type="text" name="nama"
                       value="{{ $produk->nama }}"
                       class="w-full border rounded px-3 py-2 focus:outline-none focus:ring focus:ring-blue-200">
            </div>

            <!-- Kategori -->
            <div class="mb-4">
                <label class="block mb-1 font-semibold">Kategori Produk</label>
                <select name="kategori"
                        class="w-full border rounded px-3 py-2 focus:outline-none focus:ring focus:ring-blue-200">
                    <option value="">Pilih Kategori</option>
                    @foreach ($kategori as $k)
                        <option value="{{ $k->id }}"
                            {{ $produk->id_kategori == $k->id ? 'selected' : '' }}>
                            {{ $k->nama }}
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- Qty -->
            <div class="mb-4">
                <label class="block mb-1 font-semibold">Qty</label>
                <input type="text" name="qty"
                       value="{{ $produk->qty }}"
                       class="w-full border rounded px-3 py-2 focus:outline-none focus:ring focus:ring-blue-200">
            </div>

            <!-- Harga Jual -->
            <div class="mb-4">
                <label class="block mb-1 font-semibold">Harga Jual</label>
                <input type="text" name="jual"
                       value="{{ $produk->harga_jual }}"
                       class="w-full border rounded px-3 py-2 focus:outline-none focus:ring focus:ring-blue-200">
            </div>

            <!-- Harga Beli -->
            <div class="mb-6">
                <label class="block mb-1 font-semibold">Harga Beli</label>
                <input type="text" name="beli"
                       value="{{ $produk->harga_beli }}"
                       class="w-full border rounded px-3 py-2 focus:outline-none focus:ring focus:ring-blue-200">
            </div>

            <!-- Button -->
            <div>
                <button type="submit"
                        class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-gray-600">
                    Perbaharui Data
                </button>
            </div>

        </form>
    </div>
</div>
@endsection