<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class category extends Model
{
    use HasFactory;
    protected $table='categories';
    protected $guarded=[];
    public function parent(){
        return $this->hasMany(category::class,'parent_id');
    }
}
