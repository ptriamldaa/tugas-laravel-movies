<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Cast extends Model
{
    /** @use HasFactory<\Database\Factories\CastsFactory> */
    use HasFactory, HasUuids;
    
    protected $table = 'casts';
    protected $keyType = 'string';
    public $incrementing = false;

    protected $fillable = [
        'name',
        'age',
        'biodata',
        'avatar'
    ];

    public function castMovies()
    {
        return $this->hasMany(CastMovie::class, 'cast_id');
    }
}
