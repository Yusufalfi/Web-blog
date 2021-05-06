<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Posts extends Model
{
    //
    use SoftDeletes;

    protected $fillable = ['judul', 'content', 'category_id', 'gambar', 'slug', 'users_id'];

    // relasi ke kategory
    public function category()
    {
        // one to one
        return $this->belongsTo('App\Category');
    }

    public function tags()
    {
        // many to many.  to tags model
        return $this->belongsToMany(Tags::class);
    }

    // relasi ke users

    public function users()
    {
        // one to many
        // users_id nama field di post dan id field di users
        return $this->belongsTo(User::class, 'users_id', 'id');
    }

    
}
