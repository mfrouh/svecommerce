<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    use HasFactory;

    protected $fillable=['code','start','end','cand','cand_value','type','value','message','times'];

    protected $appends=['isactive','activestatus'];

    protected $dates=['start','end'];

    public function gettype()
    {
      return  $this->type=="fixed"?'ثابت':'متغير';
    }
    public function getcand()
    {
        if ($this->cand) {
            return  $this->cand=="more"?'اكثر':'اقل';
        }
       return '';
    }
    public function getIsactiveAttribute()
    {
         if ($this->start <= now() && $this->end >= now()) {
             return 1;
         }
         else {
             return 0;
         }
    }
    public function getActivestatusAttribute()
    {
      return   $this->isactive==1?'متاح الان':'غير متاح الان';
    }
}
