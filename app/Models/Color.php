<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Product;

class Color extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded=[];

    public function product(){

        return $this->belongsToMany(Product::class,'color_product','color_id','product_id');
    }

}