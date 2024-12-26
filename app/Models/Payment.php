<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    // Mối quan hệ với bảng carts
    public function carts()
    {
        return $this->hasMany(Carts::class, 'payment_id'); // 'payment_id' là khóa ngoại trong bảng carts
    }
}
