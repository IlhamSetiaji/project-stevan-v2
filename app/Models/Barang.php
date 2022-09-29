<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Barang extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'barang';
    protected $guarded = ['id'];

    // public static function boot()
    // {
    //     parent::boot();

    //     static::created(function ($model) {
    //         $day = Carbon::now()->format('d');
    //         $month = Carbon::now()->format('m');
    //         $year = Carbon::now()->format('y');
    //         // $model->id .= Str::uuid()->toString();
    //         $model->kode_barang .= 'UGM' . $day . $month . $year . str_pad($model->id, 3, 0, STR_PAD_LEFT);
    //         $model->save();
    //     });
    // }

    public function categories()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function conditions()
    {
        return $this->belongsTo(Condition::class, 'condition_id');
    }

    public function rooms()
    {
        return $this->belongsTo(Room::class, 'room_id');
    }

    public function keterangan()
    {
        return $this->belongsTo(Keterangan::class, 'keterangan_id');
    }
}
