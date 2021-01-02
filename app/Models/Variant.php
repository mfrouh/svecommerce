<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Variant extends Model
{
    use HasFactory;

    protected $fillable=['sku','price','quantity'];

    public function values()
    {
        return $this->belongsToMany('App\Models\Value', 'variant_value', 'variant_id', 'value_id');
    }
    public function products()
    {
        return $this->belongsToMany('App\Models\Product', 'product_variant', 'variant_id', 'product_id');
    }
}
