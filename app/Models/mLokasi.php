<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class mLokasi extends Model
{
    use HasFactory;
    protected $table = "tb_lokasi";
    protected $primaryKey = 'id';
    protected $guarded = [];

    function lokasi()
    {
        return $this->belongsTo(mLokasi::class, 'id_lokasi');
    }
}
