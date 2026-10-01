<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JenisSampah extends Model
{
    protected $table = 'jenis_sampah';

    // protected $primaryKey = 'id_jenis_sampah';

    protected $fillable = ['nama_jenis', 'satuan', 'status'];

    public function hargaSampah()
    {
        return $this->hasMany(HargaSampah::class, 'id_jenis_sampah');
    }

    public function eventHargaDetails()
    {
        return $this->hasMany(EventHargaDetail::class, 'id_jenis_sampah');
    }

    public function setoran()
    {
        return $this->hasMany(Setoran::class, 'id_jenis_sampah');
    }
}
