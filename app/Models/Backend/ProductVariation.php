<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductVariation extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function Size()
    {
        return $this->belongsTo(Size::class);
    }
    public function Color()
    {
        return $this->belongsTo(Color::class);
    }
}
