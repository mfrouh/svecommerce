<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    use HasFactory;
    protected $fillable=['code','start','end','cand','cand_value','type','value','message','times'];
    protected $dates=['start','end'];
}
