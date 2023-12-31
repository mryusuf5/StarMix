<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Playlists extends Model
{
    use HasFactory;

    protected $fillable = [
        "name",
        "user_id"
    ];

    public function user()
    {
        return $this->hasOne(User::class, "id", "user_id");
    }
}
