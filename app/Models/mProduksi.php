<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class mProduksi extends Model
{
    use HasFactory;
    protected $table = "tb_produksi";
    protected $primaryKey = 'id';
    protected $guarded = [];

    public function lokasi()
    {
        return $this->belongsTo(mLokasi::class, 'id_lokasi', 'id');
    }
}
