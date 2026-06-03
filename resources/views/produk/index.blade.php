@extends('layouts.app')

@section('content')
<div class="p-6">

    @if(session('success'))
        <div class="mb-4 bg-green-500 text-white px-4 py-2 rounded">
            {{ session('success') }}
        </div>
    @endif

    <div class="flex justify-between items-center mb-4">
        <h1 class="text-xl font-bold text-white">Data Produk</h1>
        <a href="{{ route('produk.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-gray-600">
            Tambah Produk
        </a>
    </div>

    <div class="overflow-x-auto bg-white shadow rounded">
        <table class="min-w-full text-sm text-left">
            <thead class="bg-gray-200">
                <tr>
                    <th class="p-2">No</th>
                    <th class="p-2">Nama</th>
                    <th class="p-2">Kategori</th>
                    <th class="p-2">Qty</th>
                    <th class="p-2">Harga Beli</th>
                    <th class="p-2">Harga Jual</th>
                    <th class="p-2">Dibuat Pada</th>
                    <th class="p-2">Diedit Pada</th>
                    <th class="p-2">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($produk as $i => $p)
                <tr class="border-t">
                    <td class="p-2">{{ $i+1 }}</td>
                    <td class="p-2">{{ $p->nama }}</td>
                    <td class="p-2">{{ $p->kategori->nama ?? '-' }}</td>
                    <td class="p-2">{{ $p->qty }}</td>
                    <td class="p-2">{{ $p->harga_beli }}</td>
                    <td class="p-2">{{ $p->harga_jual }}</td>
                    <td class="p-2">{{ $p->created_at }}</td>
                    <td class="p-2">{{ $p->updated_at }}</td>
                    <td class="p-2">
                        <a href="{{ route('produk.show', $p->id) }}" class="text-yellow-500">Detail</a> |
                        <a href="{{ route('produk.edit', $p->id) }}" class="text-green-500">Edit</a> |
                        <form action="{{ route('produk.destroy', $p->id) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button class="text-red-500">Hapus</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection