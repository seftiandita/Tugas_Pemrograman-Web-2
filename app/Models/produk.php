<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class produk extends Model
{
    protected $guarded = ['id','created_at','updated_at'];

    public function kategori()
    {
        return $this->belongsTo(\App\Models\kategori::class, 'id_kategori');
    }

    protected $fillable = [
        'nama',
        'id_kategori',
        'qty',
        'harga_beli',
        'harga_jual'
    ];
}
