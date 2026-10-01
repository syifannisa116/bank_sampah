<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EventHarga extends Model
{
    protected $table = 'event_harga';

    // protected $primaryKey = 'id_event';

    protected $fillable = [
        'nama_event', 'tgl_mulai', 'tgl_selesai', 'keterangan', 'status',
    ];

    protected function casts(): array
    {
        return [
            'tgl_mulai' => 'date',
            'tgl_selesai' => 'date',
        ];
    }

    public function details()
    {
        return $this->hasMany(EventHargaDetail::class, 'id_event');
    }
}
