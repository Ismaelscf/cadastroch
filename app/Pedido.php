<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    function produtos() {
        return $this->belongsToMany('App\Produto', 'pedido_produtos')->withPivot('quantidade');
    }
}
