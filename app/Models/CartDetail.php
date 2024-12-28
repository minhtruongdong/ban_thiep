<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CartDetail extends Model
{
    use HasFactory;

    // Chỉ định tên bảng nếu khác với tên mặc định
    protected $table = 'cart_detail';

    // Các trường có thể được gán hàng loạt
    protected $fillable = [
        'quantity',
        'cart_id',
        'recipient_email',
        'money'
    ];

    // Định nghĩa relationship với model Carts
    public function cart()
    {
        return $this->belongsTo(Carts::class, 'cart_id');
    }

    // Nếu bạn muốn tự động cast các trường
    protected $casts = [
        'quantity' => 'integer',
        'money' => 'integer',
        'created_at' => 'datetime',
        'updated_at' => 'datetime'
    ];

    // Nếu bạn muốn thêm accessor để format tiền
    public function getFormattedMoneyAttribute()
    {
        return number_format($this->money, 0, "", ".") . 'đ';
    }

    // Nếu bạn muốn thêm accessor để tính tổng tiền
    public function getTotalMoneyAttribute()
    {
        return number_format($this->money * $this->quantity, 0, "", ".") . 'đ';
    }
} 