<?php

namespace App\Models;
use App\Models\ProductImage;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;

class Product extends Model
{

protected $fillable = [
'name',
'category_id',
'subcategory_id',
'price',
'description'
];

public function category()
{
return $this->belongsTo(Category::class);
}

public function subcategory()
{
return $this->belongsTo(Category::class,'subcategory_id');
}
public function images(){
    return $this->hasMany(ProductImage::class);
}
}