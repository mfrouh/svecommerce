<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Variant extends Model
{
    use HasFactory;

    protected $fillable=['sku','price','quantity','product_id'];
    public function values()
    {
        return $this->belongsToMany('App\Models\Value', 'variant_value', 'variant_id', 'value_id');
    }
    public function product()
    {
        return $this->belongsTo('App\Models\Product');
    }


}
