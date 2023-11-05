<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Color extends Model
{
    use HasFactory;
    public function ProductVariation()
    {
        return $this->hasMany(ProductVariation::class);
    }
}
