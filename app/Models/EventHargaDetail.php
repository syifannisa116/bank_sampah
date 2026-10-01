<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EventHargaDetail extends Model
{
    protected $table = 'event_harga_detail';

    // protected $primaryKey = 'id_event_detail';

    protected $fillable = [
        'id_event', 'id_jenis_sampah', 'harga_event',
    ];

    protected function casts(): array
    {
        return ['harga_event' => 'decimal:2'];
    }

    public function eventHarga()
    {
        return $this->belongsTo(EventHarga::class, 'id_event');
    }

    public function jenisSampah()
    {
        return $this->belongsTo(JenisSampah::class, 'id_jenis_sampah');
    }

    public function setoran()
    {
        return $this->hasMany(Setoran::class, 'id_event_detail');
    }
}
