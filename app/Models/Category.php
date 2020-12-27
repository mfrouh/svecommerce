<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable=['name','image','status','slug'];

    protected $hidden=['created_at','updated_at'];

    public static function boot()
    {
        parent::boot();
        static::saving(function ($model) {
            $model->slug = str_replace(' ','_',$model->name);
        });
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
}
