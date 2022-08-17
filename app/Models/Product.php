<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description', 'image', 'category_id', 'quantity_stock', 'price'];

    public function category() {
        return $this->belongsTo(Category::class);
    }

    public function client_orders() {
        return $this->hasMany(ClientOrder::class);
    }
}
