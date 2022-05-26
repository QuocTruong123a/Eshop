<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class order extends Model
{
     protected $table='orders';
    protected $guarded=[];
    use HasFactory;
    public function details(){
        return $this -> hasMany(orderdetail::class,'order_id');
    }
}
