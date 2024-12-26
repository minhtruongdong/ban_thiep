<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Carts extends Model
{
    use HasFactory;
   
    protected $table = 'carts';

    protected $guarded = [];
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id'); // 'user_id' là khóa ngoại trong bảng carts
    }

    // Mối quan hệ với bảng payments
    public function payment()
    {
        return $this->belongsTo(Payment::class, 'payment_id'); // 'payment_id' là khóa ngoại trong bảng carts
    }

    // Mối quan hệ với bảng products
    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id'); // 'product_id' là khóa ngoại trong bảng carts
    }
}