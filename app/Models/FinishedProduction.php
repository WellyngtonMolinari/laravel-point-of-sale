<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FinishedProduction extends Model
{
    use HasFactory;

    protected $table = 'finished_productions';

    protected $fillable = [
        'production_name',
        'category_id',
        'customer_id',
        'production_image',
        'production_store',
        'deadline_date',
        'cost_price',
        'selling_price',
        'profit_price',
        'profit_quantity',
        'production_status',
        // Add any other fields that you want to be mass assignable
    ];

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customer_id');
    }

}
