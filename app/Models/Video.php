<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    use HasFactory;
    public $withCount = ['comments'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    // TODO: Polimorfismo uno a muchos
    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable');
    }
    // FIXME: Polimorfismo uno a uno
    public function image()
    {
        return $this->morphOne(Image::class, 'imageable');
    }
    // TODO: Polimorfismo muchos a muchos
    public function tags()
    {
        return $this->morphToMany(Tag::class, 'taggable');
    }
}
