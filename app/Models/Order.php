<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    // belongsTo
    public function user()
    {
        return $this->belongsTo('App\User');
    }

     // belongsTo
     public function menu()
     {
         return $this->belongsTo('App\Models\Menu');
     }

     protected $fillable = [
        'menu_id', 'user_id',
    ];
}
