<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Keterangan extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'keterangan';
    protected $guarded = ['id'];

    public function barang()
    {
        return $this->hasMany(Barang::class);
    }
}
