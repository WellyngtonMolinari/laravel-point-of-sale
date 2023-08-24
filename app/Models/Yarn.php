<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Yarn extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function production(){
        return $this->production(Production::class,'production_id','id');
    }

    public function supplier(){
        return $this->supplier(Supplier::class,'supplier_id','id');
    }

    public function category(){
        return $this->belongsTo(Category::class,'category_id','id');
    }
}
