<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    protected $table='products';
    protected $guarded=[];
    use HasFactory;
    public function images(){
        return $this->hasMany(ProductImage::class,'product_id');
    }
    public function category(){
        return $this ->belongsTo(Category::class,'category_id');
    }
    public function image(){
        return $this ->hasMany(ProductImage::class,'product_id');
    }
}
