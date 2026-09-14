<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;

    protected $fillable = [
        'kode_barang',
        'nama_barang',
        'kategori_id',
        'supplier_id',
        'stok',
        'satuan',
        'harga_beli',
        'harga_jual',
    ];

    public function kategori()
    {
        return $this->belongsTo(Kategori::class);
    }

    public function supplier()
    {
        return $this->belongsTo(Supplier::class);
    }

    public function barangMasuks()
    {
        return $this->hasMany(BarangMasuk::class);
    }
    
    public function barangKeluars()
    {
        return $this->hasMany(BarangKeluar::class);
    }
    
}