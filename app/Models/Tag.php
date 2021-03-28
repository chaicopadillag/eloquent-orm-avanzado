<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;
    // TODO: Transfom para varios
    public function posts()
    {
        return $this->morphedByMany(Post::class, 'taggable');
    }

    public function video()
    {
        return $this->morphedByMany(Video::class, 'taggable');
    }
}
