<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'product_name',
        'category_id',
        'supplier_id',
        'product_code',
        'product_garage',
        'product_image', // Add 'production_image' to the $fillable array
        'product_store',
        'buying_date',
        'expire_date',
        'buying_price',
        'selling_price',
    ];

    public function category(){
        return $this->belongsTo(Category::class,'category_id','id');
    }

    public function supllier(){
        return $this->belongsTo(Supplier::class,'supplier_id','id');
    }
}
