<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setoran extends Model
{
    protected $table = 'setoran';

    // protected $primaryKey = 'id_setoran';

    protected $fillable = [
        'id_nasabah', 'id_petugas', 'id_jenis_sampah', 'id_event_detail',
        'nomor_transaksi', 'tgl_setoran', 'berat', 'harga_per_kg',
        'nilai_setoran', 'status', 'keterangan',
    ];

    protected function casts(): array
    {
        return [
            'tgl_setoran' => 'datetime',
            'berat' => 'decimal:3',
            'harga_per_kg' => 'decimal:2',
            'nilai_setoran' => 'decimal:2',
        ];
    }

    public function nasabah()
    {
        return $this->belongsTo(Nasabah::class, 'id_nasabah');
    }

    public function petugas()
    {
        return $this->belongsTo(User::class, 'id_petugas');
    }

    public function jenisSampah()
    {
        return $this->belongsTo(JenisSampah::class, 'id_jenis_sampah');
    }

    public function eventHargaDetail()
    {
        return $this->belongsTo(EventHargaDetail::class, 'id_event_detail');
    }

    public function mutasiSaldo()
    {
        return $this->hasOne(MutasiSaldo::class, 'id_setoran');
    }
}
