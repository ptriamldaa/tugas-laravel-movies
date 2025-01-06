<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Profile extends Model
{
    /** @use HasFactory<\Database\Factories\ProfilesFactory> */
    use HasFactory, HasUuids;
    protected $table = 'profiles';

    protected $fillable = [
        'biodata',
        'age',
        'address',
        'avatar',
        'user_id',
    ];

    public function user()
	{
		return $this->belongsTo(User::class);
	}
}
