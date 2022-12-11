<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PedidoDetalle extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function producto(){
        return $this->belongsTo(Producto::class, 'producto_id', 'id');
    }
}
