<?php

namespace App\Models;

use App\Models\Daftar;
use Illuminate\Database\Eloquent\Model;
use Nicolaslopezj\Searchable\SearchableTrait;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pasien extends Model
{
    use HasFactory;
    use SearchableTrait;
    // Azzam
    protected $guarded = [];
    protected $searchable = [
        'columns' => [
            'nama' => 1,
        ],
    ];

    public function daftar(): HasMany
    {
        return $this->hasMany(Daftar::class);
    }
}
