<?php

namespace App\Models;

use App\Models\Backend\Color;
use App\Models\Backend\Product;
use App\Models\Backend\Size;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function Product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }

    public function Color()
    {
        return $this->belongsTo(Color::class, 'color_id');
    }

    public function Size()
    {
        return $this->belongsTo(Size::class, 'size_id');
    }
}
