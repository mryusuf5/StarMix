<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlaylistSongs extends Model
{
    use HasFactory;

    protected $fillable = [
        "playlist_id",
        "song_id"
    ];

    public function songs()
    {
        return $this->hasMany(Songs::class, "id", "song_id");
    }
}
