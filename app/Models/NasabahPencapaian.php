<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NasabahPencapaian extends Model
{
    protected $table = 'nasabah_pencapaian';
    // protected $primaryKey = 'id_nasabah_pencapaian';

    protected $fillable = [
        'id_nasabah',
        'id_pencapaian',
        'tgl_diperoleh',
        'progress',
        'status',
    ];

    protected function casts(): array
    {
        return [
            'tgl_diperoleh' => 'date',
            'progress' => 'integer',
        ];
    }

    public function nasabah()
    {
        return $this->belongsTo(Nasabah::class, 'id_nasabah');
    }

    public function pencapaian()
    {
        return $this->belongsTo(Pencapaian::class, 'id_pencapaian');
    }
}
