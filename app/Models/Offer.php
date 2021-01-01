<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
    use HasFactory;

    protected $fillable=['product_id','type','value','message','start_offer','end_offer'];
    protected $dates=['start_offer','end_offer'];

    public function product()
    {
        return $this->belongsTo('App\Models\Product');
    }
}
