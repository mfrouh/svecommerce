<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable=['category_id','name','description','price','status','slug','sku'];

    protected $appends=['priceafteroffer'];

    public static function boot()
    {
        parent::boot();
        static::saving(function ($model) {
            $model->slug = str_replace(' ','_',$model->name);
            $model->sku = 'p'.$model->id;
        });
    }

    public function category()
    {
        return $this->belongsTo('App\Models\Category');
    }
    public function tags()
    {
        return $this->morphToMany(Tag::class,'taggable');
    }
    public function ScopeActive($q)
    {
     return  $q->where('status','active');
    }
    public function ScopeInActive($q)
    {
      return  $q->where('status','inactive');
    }
    public function getstatus()
    {
      return  $this->status=="active"?'مفعل':'مغلق';
    }
    public function gallery()
    {
      return $this->morphMany(Image::class,'imageable');
    }
    public function offer()
    {
        return $this->hasOne(Offer::class);
    }
    public function variants()
    {
        return $this->belongsToMany('App\Models\Variant', 'product_variant', 'product_id', 'variant_id');
    }
    public function attributes()
    {
        return $this->hasMany('App\Models\Attribute');
    }
    public function getPriceafterofferAttribute()
    {
       if ($this->offer && $this->offer->isactive) {
         if ($this->offer->type=='fixed') {
             if (($this->price - $this->offer->value)>0) {
                return $this->price - $this->offer->value;
             }
             else {
                return $this->price;
             }
         }
         if ($this->offer->type=='variable') {
            return $this->price - (($this->price*$this->offer->value)/100);
         }
       }
       return $this->price;
    }
}
