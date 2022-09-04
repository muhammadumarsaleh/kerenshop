<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    protected $hidden = [

    ];

    public function orderDetail(){
        return $this->hasMany(OrderDetail::class);
    }

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function scopeFilter($query){
         if(request('cari')) {
            return $query->where('name', 'like', '%' .request('cari'). '%');
        }
    }
}
