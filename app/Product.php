<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Product extends Model
{
    public function category()
    {
        return $this->belongsTo('App\Category');
    }

    /**
     * The roles that belong to the user.
     */
    public function sizes()
    {
        return $this->belongsToMany('App\Size');
    }
}
