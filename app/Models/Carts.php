<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Carts extends Model
{
    use HasFactory;
   
    protected $table = 'carts';

    protected $guarded = [];
    protected $fillable = ['name', 'image_custom'];

    public function user():BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id'); // 'user_id' là khóa ngoại trong bảng carts
    }

    // Mối quan hệ với bảng payments
    public function payment():BelongsTo
    {
        return $this->belongsTo(Payment::class, 'payment_id'); // 'payment_id' là khóa ngoại trong bảng carts
    }

    // Mối quan hệ với bảng products
    public function product():BelongsTo
    {
        return $this->belongsTo(Product::class, 'product_id'); // 'product_id' là khóa ngoại trong bảng carts
    }

    public function cartDetail()
    {
        return $this->hasOne(CartDetail::class, 'cart_id');
    }
}