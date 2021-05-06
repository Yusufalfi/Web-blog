<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tags extends Model
{
    //
    use SoftDeletes;
    protected $guarded = [''];

    public function posts()
    {
        // many to many.  to posts Model
        return $this->belongsToMany(Posts::class);
    }

   
}
