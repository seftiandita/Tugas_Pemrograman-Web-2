@extends('layouts.app')

@section('content')
<div class="p-6">
    
    <!-- Header -->
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-xl font-bold text-white">Detail Data Produk</h1>
        <a href="{{ route('produk.index') }}" 
           class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-gray-600">
            Kembali
        </a>
    </div>

    <!-- Card -->
    <div class="bg-white shadow rounded p-6 space-y-4">

        <!-- Nama -->
        <div>
            <label class="block mb-1 font-semibold">Nama Produk</label>
            <p class="border rounded px-3 py-2 bg-gray-50">
                {{ $produk->nama }}
            </p>
        </div>

        <!-- Kategori -->
        <div>
            <label class="block mb-1 font-semibold">Kategori Produk</label>
            <p class="border rounded px-3 py-2 bg-gray-50">
                {{ $produk->kategori->nama }}
            </p>
        </div>

        <!-- Qty -->
        <div>
            <label class="block mb-1 font-semibold">Qty Awal</label>
            <p class="border rounded px-3 py-2 bg-gray-50">
                {{ $produk->qty }}
            </p>
        </div>

        <!-- Harga Jual -->
        <div>
            <label class="block mb-1 font-semibold">Harga Jual</label>
            <p class="border rounded px-3 py-2 bg-gray-50">
                Rp {{ number_format($produk->harga_jual, 0, ',', '.') }}
            </p>
        </div>

        <!-- Harga Beli -->
        <div>
            <label class="block mb-1 font-semibold">Harga Beli</label>
            <p class="border rounded px-3 py-2 bg-gray-50">
                Rp {{ number_format($produk->harga_beli, 0, ',', '.') }}
            </p>
        </div>

    </div>
</div>
@endsection