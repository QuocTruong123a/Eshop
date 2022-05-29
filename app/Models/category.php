<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\product;
class category extends Model
{
    use HasFactory;
    protected $table='categories';
    protected $guarded=[];
    public function parent(){
        return $this->hasMany(category::class,'parent_id');
    }
    public function categorychildrent(){
        return $this->hasMany(Category::class,'parent_id');
    }
    public function products(){
        return $this ->hasMany(product::class,'category_id');
    }
}
