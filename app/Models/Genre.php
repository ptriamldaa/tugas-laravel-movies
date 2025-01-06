<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Genre extends Model
{
    /** @use HasFactory<\Database\Factories\GenresFactory> */
    use HasFactory, HasUuids;

    protected $table = 'genres';
    protected $keyType = 'string';
    public $incrementing = false;

    protected $fillable = ['name'];

    public function movie()
	{
		return $this->hasMany(Movie::class);
	}
}
