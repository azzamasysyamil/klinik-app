<?php

namespace App\Models;

use App\Models\Poli;
use App\Models\Pasien;
use Illuminate\Database\Eloquent\Model;
use Nicolaslopezj\Searchable\SearchableTrait;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Daftar extends Model
{
    use HasFactory;
    use SearchableTrait;
    // Azzam

    protected $fillable = ['tanggal_daftar', 'pasien_id', 'poli_id', 'keluhan'];

    protected $guarded = [];
    protected $casts = [
        'tanggal_daftar' => 'date'
    ];
    protected $searchable = [
        'columns' => [
            'pasiens.no_pasien' => 2,
            'pasiens.nama' => 1,
            'polis.nama' => 3,
        ],
        'joins' => [
            'pasiens' => ['pasiens.id','daftars.pasien_id'],
            'polis' => ['polis.id','daftars.poli_id'],
        ],
    ];

    public function pasien():BelongsTo
    {
        return $this->belongsTo(Pasien::class)->withDefault();
    }
    public function poli():BelongsTo
    {
        return $this->belongsTo(Poli::class)->withDefault();
    }
}