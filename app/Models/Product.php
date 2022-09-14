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

    public function scopeFilter ($query, array $filters){

        //  if(request('cari')) {
        //     return $query->where('name', 'like', '%' .request('cari'). '%');
        // }

            $query->when($filters['search'] ?? false, function($query, $search){
                return $query->where('name', 'like', '%' .$search. '%');
            });          
            

    }

    // public function scopeSortprice($query, array $sortPrice){
        // $query->when($sortPrice['pmax'] ?? false, function($query, $pmax){
        //     return data_get($query, 'price') < $pmax;
        // });

        // $query->when($sortPrice['pmin'] ?? false, function($query, $pmin){
        //     return $query->where('price') > $pmin;
        // });
    // }


    public function scopeSortprice($query, array $sortPrice){
        
        // $query->when($sortPrice['pmin'] && $sortPrice['pmax'] ?? false, function($query, $sortPrice){
        //     return $query->whereBetween('price', [$sortPrice['pmin'], $sortPrice['pmax']]);
        // });
        

        if($sortPrice('pmin') && $sortPrice('pmax')){
                return $query->whereBetween('price', [request('pmin'), request('pmax')]);
        }


    }
}


