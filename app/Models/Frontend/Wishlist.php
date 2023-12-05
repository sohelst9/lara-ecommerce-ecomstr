<?php

namespace App\Models\Frontend;

use App\Models\Backend\Product;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wishlist extends Model
{
    use HasFactory;

    public function Product()
    {
        return $this->belongsTo(Product::class);
    }
}
