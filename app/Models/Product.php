<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Product extends Model
{
    use HasFactory;
   
    protected $table = 'products';

    protected $guarded = [];

    public function category():BelongsTo{
        return $this->belongsTo(Category::class,'category_id');
    }

    public function product_image(): HasMany
    {
        return $this->hasMany(ProductImages::class);
    }

     public function carts():HasMany{
        return $this->hasMany(Carts::class, 'product_id'); // 'product_id' là khóa ngoại trong bảng carts
    }
}
