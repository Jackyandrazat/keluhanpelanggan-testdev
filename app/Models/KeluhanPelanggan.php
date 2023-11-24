<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KeluhanPelanggan extends Model
{
    use HasFactory;

    protected $table = 'keluhan_pelanggan';
    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $keyType = 'string';
    public $timestamps = true;

    protected $fillable = [
        'id',
        'nama',
        'email',
        'nomor_hp',
        'flag_aktif',
        'status_keluhan',
        'keluhan',
    ];
}
