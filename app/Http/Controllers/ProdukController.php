<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\produk;
use App\Models\kategori;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $produk = produk::all();
        return view('produk.index', compact('produk'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $kategori = kategori::all();
        return view('produk.create', compact('kategori'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'nama' => 'required|regex:/^[A-Za-z\s]+$/',
                'kategori' => 'required',
                'qty' => 'required|numeric',
                'jual' => 'required|numeric',
                'beli' => 'required|numeric',
            ],
            [
                'nama.required' => 'Nama produk wajib diisi',
                'nama.regex' => 'Nama produk harus berupa teks',
                'nama.max' => 'Nama produk maksimal 255 karakter',

                'kategori.required' => 'Kategori wajib dipilih',

                'qty.required' => 'Qty wajib diisi',
                'qty.numeric' => 'Qty harus berupa angka',

                'jual.required' => 'Harga jual wajib diisi',
                'jual.numeric' => 'Harga jual harus berupa angka',

                'beli.required' => 'Harga beli wajib diisi',
                'beli.numeric' => 'Harga beli harus berupa angka',
            ]
        );
        
        produk::create([
            'nama' => $request->nama,
            'id_kategori' => $request->kategori,
            'qty' => $request->qty,
            'harga_beli' => $request->beli,
            'harga_jual' => $request->jual,
        ]);

        return redirect()->route('produk.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $produk = Produk::where('id', $id)->first();
        return view('produk.show', compact('produk'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $produk = Produk::where('id', $id)->first();
        $kategori = Kategori::all();

        return view('produk.edit', compact('produk', 'kategori'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        Produk::where('id', $id)->update([
            'nama' => $request->nama,
            'id_kategori' => $request->kategori,
            'qty' => $request->qty,
            'harga_beli' => $request->beli,
            'harga_jual' => $request->jual,
        ]);

        return redirect()->route('produk.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Produk::where('id', $id)->delete();

        return redirect()->route('produk.index')
                         ->with('success', 'Data berhasil dihapus');
    }
}
