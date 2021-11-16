<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class mBahan extends Model
{
    use HasFactory;
    protected $table = 'tb_bahan';
    protected $primaryKey = 'id';
    protected $guarded = [];
}
